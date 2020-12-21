<?php


function awnish_get($id='',$name=''){

$page_url=seek_url('subcat');


global $chain ;
$chain=true;

$total_rows = total_rows(getall('tbl_subcategory'));
$data = getall('tbl_subcategory');
$data=limit($data);
$json_data=fetch_records($data);
prx(json_bind($json_data,200,'All The Paginated code',true,$total_rows,$page_url));


}