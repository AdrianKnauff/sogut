<?php

namespace Sogut\Core;

class Config
{
    private $baseUrl;
    private $values;
    private static $instance;
    private static $configFile;

    private function __construct()
    {
        $this->baseUrl = "";
        $this->values = [];
//        $this->loadConfigFile();
    }

    public static function getInstance(): Config
    {
        if (empty(self::$instance)) {
            self::$instance = new Config();
        }
        return self::$instance;
    }

    public function __get(string $keyName): string
    {
        return $this->values[$keyName];
    }

    public function loadConfigFile()
    {
        $configs = parse_ini_file(self::$configFile, TRUE);
        $this->values = array_pop($configs);
    }

    public static function setConfigFile($configFile)
    {
        self::$configFile = $configFile;
    }

    public static function __set(String $keyName, String $value)
    {
        $this->values[$keyName] = $value;
    }

}