<?php

require_once 'FrontController.php';
require_once 'HttpRequest.php';
require_once 'HttpResponse.php';
require_once 'FileSystemCommandResolver.php';

$resolver = new FileSystemCommandResolver('commands', 'HelloWorld');
$controller = new FrontController($resolver);

$request = new HttpRequest();
$response = new HttpResponse();

$controller->handleRequest($request, $response);
?>