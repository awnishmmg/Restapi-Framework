<?php

$hostname = 'localhost';
$username = 'aaracgzs_ezy';
$password = 'Fo9TGmeM1;6P';
$dbname='aaracgzs_ezy';


$con=mysqli_connect($hostname,$username,$password,$dbname);
if(!$con){

		echo 'Connection Error'.mysqli_error($con);
		exit;

}else{
	#echo 'Connection created'.mysqli_error($con);

}

 ?>