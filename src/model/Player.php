<?php

namespace Game\Model;


use Exception;

/**
 * Class Player
 * @package Game\Model
 * This class is used as a base class for each player.
 * @method _construct()
 */
class Player {

    public function __construct() {}

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

    public function attack() {
        try {
            echo "Attack";
        }catch (Exception $e){
            var_dump($e->getMessage());
        }
    }

    public function defend() {
        try {
            echo "Defend";
        }catch (Exception $e){
            var_dump($e->getMessage());
        }
    }

}