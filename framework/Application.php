<?php
namespace framework;

class Application
{

    public static $app;

    
    public static $starRunTime;

    public static $endRunTime;
    
    // 用于保存单例Singleton对象，以对象类型为键
    private $_singletons = [];
    
    // 用于保存依赖的定义，以对象类型为键
    private $_definitions = [];
    
    // 用于保存构造函数的参数，以对象类型为键
    private $_params = [];
    
    // 用于缓存ReflectionClass对象，以类名或接口名为键
    private $_reflections = [];
    
    // 用于缓存依赖信息，以类名或接口名为键
    private $_dependencies = [];

    public function run()
    {
        self::$starRunTime = microtime();
        self::$app = $this;
        self::init();
    }

    private static function init()
    {    
        self::registerError();
    }

    public function has()
    {}

    public function set()
    {}

    public function get()
    {}

    public function bulid()
    {}

    public static function registerError()
    {
        Error::register();
    }
}