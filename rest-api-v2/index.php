<?php
require_once 'init.php';

// Initialize the database connection
$db = new Database('localhost', 'root', 'root', 'rest_api');

// Initialize the user repository
$userRepository = new UserRepository($db);

// Initialize the request object
$request = new Request();

// Initialize the user controller with dependencies
$controller = new UserController($userRepository, $request);

// Load routes
$routes = include __DIR__ . '/routes.php';

// Initialize the router
$router = new Router($request, new RouteMatcher());

// Register routes
foreach ($routes as $route) {
    $router->addRoute($route['method'], $route['path'], $route['handler']);
}

// Dispatch the request
$response = $router->dispatch();

// Send the response
http_response_code($response->getStatusCode());
header('Content-Type: application/json');
echo $response->getBody();