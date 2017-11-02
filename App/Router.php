<?php
namespace App;

class Router
{
    /**
     * @var array
     */
    private $routes = [];

    /**
     * @param string $route
     * @param string $action
     *
     * @return $this
     */
    public function add(string $route, string $action)
    {
        $route = '/^' . str_replace('/', '\/', $route) . '$/';
        $this->routes[$route] = $action;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }
}
