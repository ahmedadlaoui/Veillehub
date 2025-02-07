

<?php

class Router
{
    private $routes = [
        'GET' => [],
        'POST' => [],
 
    ];

    // Add a route
    public function add($method, $route, $callback)
    {
        $method = strtoupper($method);

        // Convert the route to a regex for dynamic parameters
        $route = preg_replace('/\{[a-zA-Z0-9_]+\}/', '([a-zA-Z0-9_]+)', $route);

        $this->routes[$method][$route] = $callback;
    }

    // Dispatch the route

  // Router.php
public function dispatch($uri, $method) {
    $uri = parse_url($uri, PHP_URL_PATH);
    foreach ($this->routes[$method] as $route => $callback) {
        if (preg_match('#^' . $route . '$#', $uri, $matches)) {
            array_shift($matches);  // Remove the full match
            if (is_array($callback)) {
                $controller = new $callback[0]();
                $method = $callback[1];
                return call_user_func_array([$controller, $method], $matches);
            }
        }
    }
    // If no route is matched, show 404
    http_response_code(404);
    echo "404 - Not Found";
}

}
