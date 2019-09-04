<?php
require __DIR__ . '/vendor/autoload.php';

date_default_timezone_set("America/New_York");

$log = new Monolog\Logger('name');
$log->pushHandler(new Monolog\Handler\StreamHandler('logs/access.log', Monolog\Logger::WARNING));
$log->addWarning('Foo');

echo "Hello world";

?>