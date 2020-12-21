<?php


function job_get($param='')
{
	
	global $chain;
	$chain = true;

	$data = where_this(inner_join("tbl_company=`vendor_id` as vid, `name`, `description`, `email`, `logo`, `cover`, `urls`, `contact`, `working_days`, `shift`, `perks`, `status`, `zip_code`, `landmark`, `state`, `city`, `country`, `address`, `latitude`, `longitude`, `created_by`, `created_at`|tbl_jobs=`job_title`, `job_description`, `job_type`, `job_salary`, `job_email`, `contact_name`, `contact_person_designation`, `preferred_location`, `requirements`, `contact_no`, `apply_url`, `website_url`, `attachment`, `keyskills`, `status`",[
	    	'tbl_jobs'=>'tbl_company.company_id=tbl_jobs.company_id',
		]),[
		'tbl_jobs.status'=>"= '1'",
		
	]);
	json_bind(fetch_records($data),CONST_HTTP_STATUS_OK,'All Job List',true);
}