<?php

namespace App\Core;

class Router
{
    private array $routes = [];

    public function get($uri, $action)
    {
        $this->routes['GET'][$uri] = $action;
    }

    public function post($uri, $action)
    {
        $this->routes['POST'][$uri] = $action;
    }

    public function dispatch()
    {
        $method = $_SERVER['REQUEST_METHOD'];

        $uri = parse_url(
            $_SERVER['REQUEST_URI'],
            PHP_URL_PATH
        );

        $basePath = '/wcash/public';

        $uri = str_replace($basePath, '', $uri);

        if ($uri === '') {
            $uri = '/';
        }

        if (!isset($this->routes[$method][$uri])) {

            http_response_code(404);

            echo "<h1>404 Not Found</h1>";

            return;
        }

        $action = $this->routes[$method][$uri];

        [$controller, $function] = explode('@', $action);

        $controllerClass = "App\\Controllers\\{$controller}";

        $instance = new $controllerClass();

        $instance->$function();
    }
}
