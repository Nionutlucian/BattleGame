<?php


namespace Game\Model;


use Exception;
use Game\Util\Constants;
use Game\util\Printer;
use Throwable;

class Hero extends Player {

    public function __construct(){
        //Call parent constructor
        parent::__construct();
    }

    private function rapidStrike(){
        try {
            $this->logger->info("Rapid strike activated", array('Class' => __CLASS__,
                'Function' => __FUNCTION__,
                'Line' => __LINE__));
        }catch (Exception $e){
            $this->logger->error(Constants::GENERAL_EXCEPTION_MESSAGE, array('exception' => $e));
        }
    }

    private function magicShield(){
        try {
            $this->logger->info("Magic schield activated", array('Class' => __CLASS__,
                'Function' => __FUNCTION__,
                'Line' => __LINE__));
        }catch (Exception $e){
            $this->logger->error(Constants::GENERAL_EXCEPTION_MESSAGE, array('exception' => $e));
        }
    }

    //Override parent attack method
    public function attack() {
        try {
            Printer::print(Constants::PLAYER_ATTACK, $this, $this->getEnemyPlayer());

        }catch (Throwable $e){
            $this->logger->error(Constants::GENERAL_EXCEPTION_MESSAGE, array('exception' => $e));
        }
    }

    //Override parent defend method
    public function defend($damage) {
        try {
            Printer::print(Constants::PLAYER_DEFEND, $this->getEnemyPlayer(), $this);
        }catch (Throwable $e){
            $this->logger->error(Constants::GENERAL_EXCEPTION_MESSAGE, array('exception' => $e));
        }
    }

}