<?php


namespace Game\util;


use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class CustomLogger {
    private static $instance = null;
    private $logger;

    private function __construct() {
        $this->logger = new Logger('GameLogger');
        $this->logger->pushHandler(new StreamHandler(dirname(dirname(dirname(__FILE__))).'/logs/game_log.log', Logger::DEBUG));
    }

    public static function getInstance(){
        if(self::$instance == null){
            self::$instance = new CustomLogger();
        }
        return self::$instance;
    }

    public function getLogger(){
        return $this->logger;
    }

}