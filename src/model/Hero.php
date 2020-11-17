<?php


namespace Game\Model;


use Exception;
use Game\Util\Constants;
use Game\util\Printer;
use Game\util\UtilFunctions;
use Throwable;

/**
 * Class Hero
 * @package Game\Model
 * This class is used to store information about Hero player
 */
class Hero extends Player {

    public function __construct(){
        //Call parent constructor
        parent::__construct();
    }

    private $rapidStrikeChance;
    private $magicShieldChance;

    public function getRapidStrikeChance(){
        return $this->rapidStrikeChance;
    }


    public function setRapidStrikeChance($rapidStrikeChance): void{
        $this->rapidStrikeChance = $rapidStrikeChance;
    }

    public function getMagicShieldChance() {
        return $this->magicShieldChance;
    }

    public function setMagicShieldChance($magicShieldChance): void {
        $this->magicShieldChance = $magicShieldChance;
    }

    private function rapidStrike($damage){
        $result = $damage;
        try {
            if(UtilFunctions::tryYourLuck($this->getRapidStrikeChance())) {
                $result = (2 * $damage);
                Printer::print(Constants::PLAYER_RAPID_STRIKE, $this, $this->getEnemyPlayer(),
                    null, null, $result);
            }
        }catch (Exception $e){
            $this->logger->error(Constants::GENERAL_EXCEPTION_MESSAGE, array('exception' => $e));
        }
        return $result;
    }

    private function magicShield($damage){
        $result = $damage;
        try {
            if(UtilFunctions::tryYourLuck($this->getMagicShieldChance())) {
                $result = ceil($damage / 2);
                Printer::print(Constants::PLAYER_MAGIC_SHIELD, $this->getEnemyPlayer(), $this,
                    null, null, $result);
            }
        }catch (Exception $e){
            $this->logger->error(Constants::GENERAL_EXCEPTION_MESSAGE, array('exception' => $e));
        }
        return $result;
    }

    //Override parent attack method
    public function attack() {
        try {
            Printer::print(Constants::PLAYER_ATTACK, $this, $this->getEnemyPlayer());
            $damage = $this->getStrength() - $this->getEnemyPlayer()->getDefence();

            //If the rapid strike is activated we double up the damage
            $damageFromRapidStrike = $this->rapidStrike($damage);
            $this->getEnemyPlayer()->defend($damageFromRapidStrike);


        }catch (Throwable $e){
            $this->logger->error(Constants::GENERAL_EXCEPTION_MESSAGE, array('exception' => $e));
        }
    }

    //Override parent defend method
    public function defend($damage) {
        try {
            Printer::print(Constants::PLAYER_DEFEND, $this->getEnemyPlayer(), $this);
            if(UtilFunctions::tryYourLuck($this->getLuck())){
                Printer::print(Constants::PLAYER_MISS, $this->getEnemyPlayer(), $this);
            }else {
                $damage = $this->magicShield($damage);
                $this->setHealth($this->getHealth() - $damage);
                if($this->getHealth() > 0) {
                    Printer::print(Constants::PLAYER_GIVE_DAMAGE, $this->getEnemyPlayer(), $this,
                        null, null, $damage);
                }else{
                    Printer::print(Constants::DEFENDER_IS_DEAD, $this->getEnemyPlayer(), $this,
                        null, null, $damage);
                    Printer::print(Constants::BATTLE_FINISHED, $this->getEnemyPlayer(), $this,
                        null, null, $damage);
                    exit();
                }
            }
        }catch (Throwable $e){
            $this->logger->error(Constants::GENERAL_EXCEPTION_MESSAGE, array('exception' => $e));
        }
    }

}