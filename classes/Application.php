<?php


class Application
{
    protected static $_instance;
    protected $container;

    public static function getInstance()
    {
        if (self::$_instance == null) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function get($key)
    {
        return $this->container[$key];
    }

    public function set($key, $value)
    {
        $this->container[$key] = $value;
    }

    protected function __clone()
    {

    }

    protected function __construct()
    {

    }

}