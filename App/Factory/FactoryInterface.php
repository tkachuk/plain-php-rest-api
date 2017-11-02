<?php
namespace App\Factory;

interface FactoryInterface
{
    /**
     * @param string $className
     *
     * @return mixed
     */
    public static function create(string $className);
}
