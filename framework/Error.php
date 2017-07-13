<?php
namespace framework;

use Exception;
use TypeError;

class Error
{

    public static function register()
    {
        error_reporting(E_ALL);
        set_error_handler([
            __CLASS__,
            'error'
        ]);
        set_exception_handler([
            __CLASS__,
            'exception'
        ]);
        register_shutdown_function([
            __CLASS__,
            'shutdown'
        ]);
    }

    public static function error($errno, $errstr, $errfile = '', $errline = 0, $errcontext = [])
    {
        $exception = new Exception($errno, $errstr, $errfile, $errline, $errcontext);
        throw self;
    }

    public static function exception($error)
    {
        $error = new TypeError($error);
    }

    public static function shutdown()
    {
        if ($error = error_get_last()) {
            $exception = new Exception($error['type'], $error['message'], $error['file'], $error['line']);
            $this->exception($exception);
        }
    }  
}