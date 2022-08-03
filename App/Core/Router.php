<?php

use App\Core\Templates;

class Router extends Templates
{
    public array $routes = [];

    public function Route($action, Closure $callback): void
    {
        $action = trim($action, '/');
        $action = preg_replace('/{[^}]+}/', '(.*)', $action);

        $this->routes[$action] = $callback;
    }

    public function Dispatch($action): void
    {
        $action = trim($action, '/');
        $matches = null;
        $callback = null;
        $params = [];

        foreach ($this->routes as $route => $handler) {
            if (preg_match("%^{$route}$%", $action, $matches) === 1) {
                $callback = $handler;
                unset($matches[0]);
                $params = $matches;
                break;
            }
        }

        if (!$callback || !is_callable($callback)) {
            http_response_code(404);
            Templates::Http_Response_Code();
            exit;
        }

        echo $callback($params);
    }

}