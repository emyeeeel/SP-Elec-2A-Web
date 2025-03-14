<?php
require 'api/BookController.php';

$requestMethod = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uriSegments = explode('/', $uri);

// Find the position of 'books' in the URI
$booksIndex = array_search('books', $uriSegments);

// If 'books' is not found, return 404
if ($booksIndex === false) {
    header("HTTP/1.1 404 Not Found");
    exit();
}

// Extract the book ID (if present)
$bookId = isset($uriSegments[$booksIndex + 1]) ? $uriSegments[$booksIndex + 1] : null;

$controller = new BookController();

switch($requestMethod) {
    case 'GET':
        if ($bookId) {
            $controller->getBook($bookId);
        } else {
            $controller->getAllBooks();
        }
        break;
    case 'POST':
        $controller->createBook();
        break;
    case 'PUT':
        if ($bookId) {
            $controller->updateBook($bookId);
        }
        break;
    case 'DELETE':
        if ($bookId) {
            $controller->deleteBook($bookId);
        }
        break;
    default:
        header("HTTP/1.1 405 Method Not Allowed");
        break;
}