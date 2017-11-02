<?php
namespace App\Factory;

use App\Controllers\Controller;

class ControllerFactory implements FactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public static function create(string $className) :Controller
    {
        $className = '\\App\\Controllers\\' . $className;

        return new $className();
    }
}
