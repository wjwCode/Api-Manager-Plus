<?php
/**
 * 
 * 
 * @author zhouyangyang 2017年7月13日上午11:51:39
 */
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

    public function bootstrap()
    {
        self::$starRunTime = microtime();
        
        self::$app = $this;
        //registerError
        self::registerError();
        
        Bootstrap::run();
        
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