<?php
namespace App\Middleware;

use App\Request;

interface MiddlewareInterface
{
    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function handle(Request $request);
}
