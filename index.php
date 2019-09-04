<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
date_default_timezone_set("America/New_York");

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$app = AppFactory::create();

// Add Routing Middleware
$app->addRoutingMiddleware();

/*
 * Add Error Handling Middleware
 *
 * @param bool $displayErrorDetails -> Should be set to false in production
 * @param bool $logErrors -> Parameter is passed to the default ErrorHandler
 * @param bool $logErrorDetails -> Display error details in error log
 * which can be replaced by a callable of your choice.
 
 * Note: This middleware should be added last. It will not handle any exceptions/errors
 * for middleware added after it.
 */
$errorMiddleware = $app->addErrorMiddleware(true, true, true);

$app->get('/', function (Request $request, Response $response, $args) {
     $msg = "homepage";
     $response->getBody()->write($msg);
     return $response;
});

$app->get('/contact', function (Request $request, Response $response, $args) {
    $msg = "contact";
    $response->getBody()->write($msg);
    return $response;
});

$app->run();


?>