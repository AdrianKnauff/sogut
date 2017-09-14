<?php

namespace Sogut\Core;

//use Sogut\Controller\page\pub\ImpressumController;
use Sogut\Controller\page\pub\Error404Controller;
//use Sogut\Controller\page\pub\IndexController;

class Router
{

    private function getRelativeRequest(string $host)
    {
        return str_replace($host . '/', "", $this->getRequestedUrl());
    }

    public function getRequestedUrl()
    {
        $actual_link = 'http' . (isset($_SERVER['HTTPS']) ? "s" : "") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        return $actual_link;
    }

    public function getPath()
    {
        $relativeRequest = $this->getRelativeRequest(Config::getInstance()->baseUrl);
        if (strpos($relativeRequest, "?") === 0) {
            return "";
        } else {
            $relativeRequestWithoutEnd = strtok($relativeRequest, '?');
            return rtrim($relativeRequestWithoutEnd, "/");
        }
    }

    public function route()
    {
//        switch ($this->getPath()) {
//            case '':
//                $controller = new IndexController();
//                $controller->output();
//                die();
//
//            case 'impressum':
//                $Controller = new ImpressumController();
//                $Controller->output();
//                die();
//        }

        // 404
        $controller = new Error404Controller();
        $controller->output();
        die();
    }
}