<?php


############# Get Request #################

function plans_get($columns='',$param=''){

if($columns=='' or $param == ''):
json_bind(getall('tbl_plans'),CONST_HTTP_STATUS_OK,'All Plans',true);
else:
$queryobj=runsql('Select * from tbl_plans');
$columns_list=$queryobj['columns_list'];

if(in_columns($columns_list,$columns)){
json_bind(select('tbl_plans','',[
$columns => ['=',$param],
]),CONST_HTTP_STATUS_OK,'All Plans',true);

}else{

json_bind(array('error'=>'argument_error'),CONST_HTTP_STATUS_OK,'No columns matched to the Table',false);

}
endif;


}

############# Get Request #################
############# Post Request ################

function plans_post(){

		if(insertat('tbl_plans',[

			'mega_cat_id'=>parsejson()['mega_cat_id'],
			'name'=>parsejson()['name'],
			'title'=>parsejson()['title'],
			'description'=>parsejson()['description'],
			'banner'=>parsejson()['banner'],
			'status'=>parsejson()['status']

		])):

			json_bind(true,200,'Plans inserted',true);

		else:

			json_bind(false,200,'Plans failed',false);

		endif;

	}
############# Post Request ################

############# Put Request #################

function plans_put(){

		if(update('tbl_plans',[

			'name'=>parsejson()['name'],
			'title'=>parsejson()['title'],
			'description'=>parsejson()['description'],
			'banner'=>parsejson()['banner'],
			'status'=>parsejson()['status'],
			'created_by'=>parsejson()['created_by']

		],['plans_id'=>parsejson()['plans_id']])):

			json_bind(true,CONST_HTTP_STATUS_OK,'Record Updated !',true);

		else:

			json_bind(false,CONST_HTTP_STATUS_OK,'error',false);

		endif;

	}

############# Put Request ################
############# Delete Request ################
	function plans_delete(){

		if(delete('tbl_plans',[

			'plans_id'=>parsejson()['plans_id'],

		])):

			json_bind(true,CONST_HTTP_STATUS_OK,'Record Deleted',true);

		else:

			json_bind(false,CONST_HTTP_STATUS_OK,'Error !',false);

		endif;

	}
############# Delete Request ################

