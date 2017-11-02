<?php
namespace App;

use App\Factory\ControllerFactory;
use App\Factory\MiddlewareFactory;
use App\Middleware\BasicAuth;

class Application
{
    /**
     * @var array
     */
    private $middleware = [
        BasicAuth::class
    ];

    /**
     * @param Request $request
     * @param Router $router
     *
     * @return mixed
     */
    public function handle(Request $request, Router $router)
    {
        $this->middlewarePrepare($request);

        foreach ($router->getRoutes() as $pattern => $action) {
            if (preg_match($pattern, $request->getUri(), $params)) {
                array_shift($params);
                return $this->runController($action, $params);
            }
        }

        //TODO add handling case if rout not found
    }

    /**
     * @param Request $request
     */
    private function middlewarePrepare(Request $request)
    {
        foreach ($this->middleware as $className) {
            $middleware = MiddlewareFactory::create($className);
            $middleware->handle($request);
        }
    }

    /**
     * @param $action
     * @param $params
     *
     * @return mixed
     */
    private function runController($action, $params)
    {
        list($controllerName, $method) = explode('@', $action);

        $controller = ControllerFactory::create($controllerName);

        return call_user_func_array([$controller, $method], array_values($params));
    }
}
