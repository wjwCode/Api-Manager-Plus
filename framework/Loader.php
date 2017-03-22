<?php
namespace framework;

class Loader
{
    // 自动加载的文件
    private static $autoloadFiles = [];
    // 映射文件
    private static $mapFiles = [];
    
    public static $namespaceAlias;
    
    public static $isWin;
    // 自动加载
    public static function autoload($class)
    {
        // 检测命名空间别名
        if (!empty(self::$namespaceAlias)) {
            $namespace = dirname($class);
            if (isset(self::$namespaceAlias[$namespace])) {
                $original = self::$namespaceAlias[$namespace] . '\\' . basename($class);
                if (class_exists($original)) {
                    return class_alias($original, $class, false);
                }
            }
        }
    
        if ($file = self::includeFile($class)) {
            // Win环境严格区分大小写
            if (self::$isWin && pathinfo($file, PATHINFO_FILENAME) != pathinfo(realpath($file), PATHINFO_FILENAME)) {
                return false;
            }
            include $file;
            return true;
        }
    }
    public static function register($autoload = '')
    {
        self::$isWin = (strpos(PHP_OS, 'WIN') !== false)?true:false;
        // 注册系统自动加载
        spl_autoload_register($autoload ?: 'framework\\Loader::autoload', true, true);
        
    }
    
    private static function includeFile($class)
    { 
        if (!empty(self::$mapFiles[$class])) {
            return self::$mapFiles[$class];
        }
        $class = strtr($class, '\\',DS).'.php';
        if(current(explode(DS, $class)) == 'framework'){
            return include dirname(FRAMEWORK_PATH).DS.$class;
        }else{
            return include APP_PATH.$class;
        }
    }
}