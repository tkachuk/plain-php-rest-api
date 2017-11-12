<?php
namespace App\Controllers;

abstract class Controller
{
    /**
     * @var array
     */
    protected $statuses = [
        200 => '200 OK',
        404 => '404 Not Found',
    ];

    /**
     * @param array $data
     * @param int $code
     */
    protected function jsonResponse(array $data = [], $code = 200)
    {
        header_remove();
        http_response_code($code);
        header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
        header('Content-Type: application/json');
        header('Status: ' . $this->statuses[$code]);
        header('Content-Type: application/json');

        echo json_encode($data);
    }
}