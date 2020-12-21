<?php
define('autoloading',TRUE,1);
define('BASE_URL','https://homes.aaraclouds.com/api_testing/web/',1);

define('API_DIR','api');

$autoload['define']=array('lang','error','http_status');

$autoload['config']=array('php_ini','database','api_routes','define','auth','pagination','page_routes','globals','make_global');

$autoload['library'] =array('query-builder.class','model-loader.class');

#Helpers Loaders

$autoload['helper'] =array('debugger','ajax','uri_segment','htaccess','json','password','package','raw_upload'); #_helper

$autoload['model'] = array(); #_model

$db['prefix'] = 'tbl_';

#All the modular projects projects

$modular['admin']='admin';
$modular['ajax']='ajax';


#Add the Code Snippet
#$autoload['snippet']=array('code');

##############################| To Add Any New Extensions |###########################






















































?>