<?php

namespace Sogut\Core;

use Sogut\Controller\page\pub\ImpressumController;
use Sogut\Controller\page\pub\Error404Controller;
use Sogut\Controller\page\pub\IndexController;

class Router
{

    private static function getRelativeRequest($host)
    {
        return str_replace($host . '/', "", self::getRequestedUrl());
    }

    public static function getRequestedUrl()
    {
        $actual_link = 'http' . (isset($_SERVER['HTTPS']) ? "s" : "") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        return $actual_link;
    }

    public static function getPath()
    {
        $relativeRequest = self::getRelativeRequest(Config::getInstance()->baseUrl);
        if (strpos($relativeRequest, "?") === 0) {
            return "";
        } else {
            $relativeRequestWithoutEnd = strtok($relativeRequest, '?');
            return rtrim($relativeRequestWithoutEnd, "/");
        }
    }

    public static function route()
    {
        switch (self::getPath()) {
            case '':

                $controller = new IndexController();
                $controller->output();
                die();

            case 'impressum':
                $Controller = new ImpressumController();
                $Controller->output();
                die();

//            case 'datenschutz':
//                $Controller = new \application\Controller\page\pub\DatenschutzController();
//                $Controller->output();
//                die();
        }

        // 404
        $controller = new Error404Controller();
        $controller->output();
        die();
    }
}