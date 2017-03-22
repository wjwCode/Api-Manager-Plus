<?php
defined('API_DEBUG') or define('API_DEBUG', true);

(new api\Application($config))->run();