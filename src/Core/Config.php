<?php

namespace Sogut\Core;

class Config
{
    private $baseUrl;
    private $values;
    private static $instance;

    /**
     * Config constructor.
     */
    private function __construct()
    {
        $this->baseUrl = "";
        $this->values = [];
        $this->loadConfigFile();
    }

    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new Config();
        }
        return self::$instance;
    }

    public function __get(string $keyName)
    {
        return $this->values[$keyName];
    }

    public function loadConfigFile()
    {
        $configFile = 'resources' . DIRECTORY_SEPARATOR . 'config.ini';
        $configs = parse_ini_file($configFile, TRUE);

//        $this->baseUrl = Router::getRequestedUrl();
        $this->values = array_pop($configs);
    }
}