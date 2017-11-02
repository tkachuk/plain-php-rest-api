<?php
namespace App;

class Request
{
    /**
     * @var string
     */
    private $uri;

    /**
     * @var array
     */
    private $server;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Request initialization
     */
    private function initialize()
    {
        $this->uri    = $_SERVER['REQUEST_URI'];
        $this->server = $_SERVER;
    }

    /**
     * @return string
     */
    public function getUri() :string
    {
        return $this->uri;
    }

    /**
     * @return array
     */
    public function getServer() :array
    {
        return $this->server;
    }
}
