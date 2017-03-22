<?php
// index run
defined('API_DEBUG') or define('API_DEBUG', true);
defined('DS') or define('DS',DIRECTORY_SEPARATOR);
defined('FRAMEWORK_PATH') or define('FRAMEWORK_PATH', dirname(__FILE__) .DS. 'framework' .DS);
defined('APP_PATH') or define('APP_PATH', dirname(__FILE__) . DS. 'Api' .DS);
defined('WEB_PATH') or define('WEB_PATH', dirname(__FILE__) . DS);
require (FRAMEWORK_PATH.'Loader.php');
\framework\Loader::register();
(new \framework\Application())->run();