<?php
namespace App\Factory;

use App\Middleware\MiddlewareInterface;

class MiddlewareFactory implements FactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public static function create(string $className) :MiddlewareInterface
    {
        return new $className();
    }
}
