<?php

namespace Sogut\Core;

class Router
{
    protected $namespace = "";

    private function getRelativeRequest(string $host): string
    {
        return str_replace($host . '/', "", $this->getRequestedUrl());
    }

    public function getRequestedUrl(): string
    {
        $actual_link = 'http' . (isset($_SERVER['HTTPS']) ? "s" : "") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        return $actual_link;
    }

    public function getPath(): string
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
        $className = $this->namespace . "\\" . $this->convertToControllerClassName($this->getPath());
        $controller = new $className();
        $controller->output();
    }

    /**
     *  convention over configuration
     *
     * index_hallo_123 -> Indexhallo123Controller
     *
     * @param $path
     * @return string
     */
    protected function convertToControllerClassName($path)
    {
        if (empty($path)) {
            return "IndexController";
        }
        return str_replace(["_", "-"], "", ucwords($path, "_- ")) . 'Controller';
    }

    public function setNamespace($namespace)
    {
        $this->namespace = $namespace;
    }
}