<?php
require_once 'init.php';

// 1. Initialize DBORM with your database credentials
$driver = 'mysql:host=localhost;dbname=rest_api;charset=utf8'; // PDO-compatible DSN
$user = 'root';
$password = 'root';

$dbORM = new DBORM($driver, $user, $password);

// 2. Initialize the user repository with DBORM
$userRepository = new UserRepository($dbORM); // Ensure UserRepository accepts iDBFuncs

// 3. Initialize the request object
$request = new Request();

// 4. Initialize the user controller
$controller = new UserController($userRepository, $request);

// 5. Load routes
$routes = include __DIR__ . '/routes.php';

// 6. Initialize the router
$router = new Router($request, new RouteMatcher());

// 7. Register routes
foreach ($routes as $route) {
    $router->addRoute($route['method'], $route['path'], $route['handler']);
}

// 8. Dispatch the request and handle errors
try {
    $response = $router->dispatch();
} catch (PDOException $e) {
    // Handle database errors
    $response = new Response(500, ['error' => 'Database error: ' . $e->getMessage()]);
} catch (Exception $e) {
    // Handle other exceptions
    $response = new Response(500, ['error' => 'Server error: ' . $e->getMessage()]);
}

// 9. Send the response
http_response_code($response->getStatusCode());
header('Content-Type: application/json');
echo $response->getBody();