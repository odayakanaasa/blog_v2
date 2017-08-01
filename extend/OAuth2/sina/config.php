<?php
$default = [
	'WB_AKEY' 			=> '' ,
	'WB_SKEY' 			=> '' ,
	'WB_CALLBACK_URL' 	=> '' ,
];
$config = array_merge( $default, config('sina_config') );
return $config;