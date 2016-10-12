<?php

$domain = 'localhost';
if(function_exists('apache_request_headers'))
{
	$domain = apache_request_headers()['Host'];
}

$name_config_file = $domain;
$file = __DIR__ . '/domains/' . $name_config_file . '.php';

$is_config_file = false;
if(file_exists($file))
{
	$config = require($file);
	$is_config_file = true;
}

return [
    'admin_email' => 'admin@localhost',
	'config' => (isset($config) ? $config : null),
	'is_config_file' => $is_config_file,
	'domain' => $name_config_file,
	'tinymce_lang'=>null, //'en',
	'upload_folder' => 'uploads',
	'upload_finder' => 'uploads_finder',
	'app_version' => '2.1.22.0046',
];

unset($domain);
unset($name_config_file);
unset($is_config_file);
unset($file);

if(isset($config)) { unset($config); }