<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Respect\Validation\Validator as v;

require 'vendor/autoload.php';
require 'bootstrap.php';
require 'dao/User.php';
require 'includes/AuthHandler.php';
global $entityManager;
$app = new \Slim\app([
	'settings' => [
        'displayErrorDetails' => true
    ]
]);
$ah =new AuthHandler($entityManager);

$app->get('/', function(Request $request, Response $response) {
    return $response->getBody()->write("Slim is gud");
});

$app->post('/auth', function(Request $request, Response $response) use($ah, $entityManager) {
    $param = $request->getQueryParams();
    if(isset($param['email']) && isset($param['password']) && $ah->authenticateUser($param['email'], $param['password'])){
        return $response->getBody()->write($ah->generateToken($_SERVER['REMOTE_ADDR'], $param['email']));
    }
    return $response->getBody()->write(json_encode(array('errMsg'=>'Authorisation failed')));
});

$app->post('/profile', function(Request $request, Response $response) use($ah, $entityManager) {
    $jsonArr = json_decode($request->getQueryParams()['json'], true);
    if($ah->verifyToken($jsonArr['token'], $_SERVER['REMOTE_ADDR'], $jsonArr['email']))
    return $response->getBody()->write(print_r($_SESSION['user']));
    else return $response->getBody()->write(print_r($jsonArr));
});

$app->get('/hash/{pass}', function(Request $request, Response $response) {
    return $response->getBody()->write(password_hash($request->getAttribute('pass'), PASSWORD_DEFAULT));
});

$app->run();