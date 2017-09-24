<?php

namespace Sogut\Core;

use Sogut\Database\MySQLConnection;

// TODO: da kann man dann auch gleich den Router benutzen und Application rauswerfen!

class Application
{

    public function __construct(Router $router)
    {
        $router->route();
    }

}