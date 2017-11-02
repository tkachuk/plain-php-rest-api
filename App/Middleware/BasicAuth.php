<?php
namespace App\Middleware;

use App\Request;

class BasicAuth implements MiddlewareInterface
{
    /**
     * @var string
     */
    private $user     = 'foo';

    /**
     * @var string
     */
    private $password = 'bar';

    /**
     * {@inheritdoc}
     */
    public function handle(Request $request)
    {
        if (!isset($request->getServer()['PHP_AUTH_USER']) || !$this->auth($request)) {
            header('WWW-Authenticate: Basic realm="My Realm"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'Unauthorized';
            exit;
        }
    }

    /**
     * @param Request $request
     *
     * @return bool
     */
    private function auth(Request $request)
    {
        return  $this->user === $request->getServer()['PHP_AUTH_USER']
            && $this->password === $request->getServer()['PHP_AUTH_PW'];
    }
}
