<?php

namespace Framework;

use App\Controllers\ErrorController;
use Framework\Middleware\Authorize;

class Router
{
    protected $routes = [];

    public function registerRoute($method, $uri, $action, $middleware = [])
    {
        [$controller, $controllerMethod] = explode('@', $action);

        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'controllerMethod' => $controllerMethod,
            'middleware' => $middleware
        ];
    }

    public function get($uri, $controller, $middleware = [])
    {
        $this->registerRoute('GET', $uri, $controller, $middleware);
    }

    public function post($uri, $controller, $middleware = [])
    {
        $this->registerRoute('POST', $uri, $controller, $middleware);
    }

    public function put($uri, $controller, $middleware = [])
    {
        $this->registerRoute('PUT', $uri, $controller, $middleware);
    }

    public function delete($uri, $controller, $middleware = [])
    {
        $this->registerRoute('DELETE', $uri, $controller, $middleware);
    }

    public function route($uri)
    {

        $requestMethod = $_SERVER['REQUEST_METHOD'];

        if ($requestMethod === "POST" && isset($_POST['_method'])) {
            $requestMethod = strtoupper($_POST['_method']);
        }

        foreach ($this->routes as $route) {

            $uriSegments = explode('/', trim($uri, '/'));

            $routeSegments = explode('/', trim($route['uri'], '/'));

            $match = true;

            if (count($uriSegments) === count($routeSegments) && strtoupper(
                $route['method'] === $requestMethod
            )) {
                $params = [];

                $match = true;

                for ($i = 0; $i < count($uriSegments); $i++) {
                    if ($routeSegments[$i] !== $uriSegments[$i] && !preg_match('/\{(.+?)\}/', $routeSegments[$i])) {
                        $match = false;
                        break;
                    }

                    if (preg_match('/\{(.+?)\}/', $routeSegments[$i], $matches)) {
                        $params[$matches[1]] = $uriSegments[$i];
                    }
                }

                if ($match) {
                    foreach ($route['middleware'] as $middleware) {
                        (new Authorize())->handle($middleware);
                    }

                    $controller = 'App\\Controllers\\' . $route['controller'];
                    $controllerMethod = $route['controllerMethod'];

                    $controllerInstance = new $controller();
                    $controllerInstance->$controllerMethod($params);

                    return;
                }
            }
        }

        ErrorController::notFound();
    }
}
