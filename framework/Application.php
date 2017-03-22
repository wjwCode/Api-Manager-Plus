<?php
namespace framework;

class Application
{

    public static $app;

    public static $starRunTime;

    public static $endRunTime;

    public function run()
    {
        self::$starRunTime = microtime();
        self::init();
    }

    private static function init()
    {
        self::$app = $this;
        $this->registerError();
    }

    public function has()
    {
        
    }
    
    public function set()
    {}

    public function get()
    {}

    public function bulid()
    {}
    
    public function registerError()
    {
        Error::register();
    }
}