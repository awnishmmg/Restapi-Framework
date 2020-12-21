<?php


############# Get Request ################	
	function findshop_get(){

		json_bind([],200,'UNKNOWN METHOD',false);

	}
############# Get Request ################
############# Post Request ###############
	function findshop_post(){
		
		global $con;
		$latitude = parsejson()['shop_latitude'];
		$longitude = parsejson()['shop_longitude'];
		$distance_km = parsejson()['distance_km'];
		
		$radius_km = $distance_km;
		$sql_distance = " ,(((acos(sin((".$latitude."*pi()/180)) * sin((`tbl_shop`.`shop_latitude`*pi()/180))+cos((".$latitude."*pi()/180)) * cos((`tbl_shop`.`shop_latitude`*pi()/180)) * cos(((".$longitude."-`tbl_shop`.`shop_longitude`)*pi()/180))))*180/pi())*60*1.1515*1.609344) as distance ";
		$having = " HAVING (distance <= $radius_km) "; 
		$order_by = ' distance ASC ';
		$sql = "SELECT tbl_shop.*".$sql_distance." FROM tbl_shop $having ORDER BY $order_by";
		prx($sql);
		$res = mysqli_query($con,$sql);
		if(mysqli_num_rows($res)>0)
		{
			while($row = mysqli_fetch_assoc($res))
			{
				$data[] = $row;
			}
			json_bind($data,200,'Record Found',true);
		}
		else
		{
			json_bind([],CONST_HTTP_STATUS_OK,'Record Not Found',true);
		}
	}
############# Post Request ################