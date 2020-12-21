<?php


function findproduct_fromshop_get()
{
	$mega_cat_id = '1';
	global $chain;

	$chain = true;

	prx(fetch_records(where(poly_join("tbl_mega_category=mega_cat_id|tbl_category=cat_id as category_id,title as cat_title,description as category_description,image_path as cat_image,unicode as cat_unicode,height as cat_height,width as cat_width",['mega_cat_id'],'left'),['tbl_category.mega_cat_id'=>['=',$mega_cat_id]])));
	
}