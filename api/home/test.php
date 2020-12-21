<?php


############# Get Request ################	

function test_get($latitude='',$longitude='',$distance_km=''){

global $chain;
$chain=true;

prx(where_this('Select from table_name',[
	'tablename.column_name'=>'=tbl_xyz.meta_id or',
	'tablename.tmp'=>"<='10'",


]));


}


############# Get Request ################
