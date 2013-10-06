<?php
use \Slim\Log;
use \Slim\Extras\Log\DateTimeFileWriter;

return array(
	'debug' => false,
	'log.enabled' => true,
	'log.level' => Log::DEBUG,
	'log.writer' => new DateTimeFileWriter(array('path' => '../logs')),
	'mode' => 'development',
);