<?php
$default = [
	'appid' 	=> '',
    'appkey' 	=> '',
    'callback' 	=> '',
    'scope'		=> 'get_user_info'
];
$config = array_merge($default, config('qq_config') );
return $config;