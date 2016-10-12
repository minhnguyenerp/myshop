<?php
return [
	'domain'=>'localhost',
	'host'=>'127.0.0.1',
	'database'=>'ivy',
	'db_user'=>'root',
	'db_pass'=>'',
	
	'timeZone'=>'America/Los_Angeles',
	'language'=>'en-US',
	'format'=>[
		'date'=>'mm/dd/yyyy',	// This is for the date input mask format
		'time'=>'hh:ii',
		'datetime'=>'mm/dd/yyyy hh:ii',
		
		'jdate'=>'mm/dd/yy',	// This is for jQuery format. jQuery use yy instead of yyyy
		'jtime'=>'hh:ii',
		'jdatetime'=>'mm/dd/yy hh:ii',
		
		'phpdate'=>'m/d/Y',		// This is for php format
		'phptime'=>'H:i',
		'phpdatetime'=>'m/d/Y H:i',
		
		'currency'=>'$,.',
	],
];