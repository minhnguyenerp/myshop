<?php

$common = require(__DIR__ . '/common.php');

$config = [];

$configs = array_replace_recursive($common, $config);

return $configs;