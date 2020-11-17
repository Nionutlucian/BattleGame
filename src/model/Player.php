<?php

namespace Game\Model;

use Game\Util\Constants;
use Game\util\CustomLogger;
use Game\util\Printer;
use Game\util\UtilFunctions;
use Throwable;

/**
 * Class Player
 * @package Game\Model
 * This class is used as a base class for each player.
 * @method _construct()
 */
class Player {

    public function __construct() {
        $this->logger = CustomLogger::getInstance()->getLogger();
    }

    //logger need to be public because is inherited in child classes
    public $logger;

    private string $name;
    private int $health;
    private int $strength;
    private int $defence;
    private int $speed;
    private int $luck;
    private Player $enemy;

    public function getName() : string {
        return $this->name;
    }

    public function setName(string $name) : void {
        $this->name = $name;
    }

    public function getHealth() : int {
        return $this->health;
    }

    public function setHealth(int $health) : void {
        $this->health = $health;
    }

    public function getStrength() : int {
        return $this->strength;
    }

    public function setStrength(int $strength) : void {
        $this->strength = $strength;
    }

    public function getDefence() : int {
        return $this->defence;
    }

    public function setDefence(int $defence) : void {
        $this->defence = $defence;
    }

    public function getSpeed() : int{
        return $this->speed;
    }

    public function setSpeed(int $speed) : void {
        $this->speed = $speed;
    }

    public function getLuck() : int {
        return $this->luck;
    }

    public function setLuck(int $luck) : void {
        $this->luck = $luck;
    }

    public function setEnemyPlayer(Player $enemy) : void {
        $this->enemy = $enemy;
    }

    public function getEnemyPlayer() : Player {
        return $this->enemy;
    }

    public function attack() {
        try {
            Printer::print(Constants::PLAYER_ATTACK, $this, $this->getEnemyPlayer());
            $damage = $this->getStrength() - $this->getEnemyPlayer()->getDefence();
            $this->getEnemyPlayer()->defend($damage);


        }catch (Throwable $e){
            $this->logger->error(Constants::GENERAL_EXCEPTION_MESSAGE, array('exception' => $e));
        }
    }

    public function defend(int $damage) {
        try {
            Printer::print(Constants::PLAYER_DEFEND, $this->getEnemyPlayer(), $this);
            if(UtilFunctions::tryYourLuck($this->getLuck())){
                Printer::print(Constants::PLAYER_MISS, $this->getEnemyPlayer(), $this);
            }else {
                $this->setHealth($this->getHealth() - $damage);
                if($this->getHealth() > 0) {
                    Printer::print(Constants::PLAYER_GIVE_DAMAGE, $this->getEnemyPlayer(), $this, null,
                                    null, $damage);
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