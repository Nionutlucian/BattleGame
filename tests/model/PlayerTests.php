<?php


namespace model;

use Game\Model\Player;
use Game\Util\Constants;
use PHPUnit\Framework\TestCase;

class PlayerTests extends TestCase{

    private Player $player;

    public function setUp() {
        parent::setUp();

        $this->player = new Player();
        $this->player->setName(Constants::PLAYER_NAME);
        $this->player->setDefence(Constants::PLAYER_DEFENCE);
        $this->player->setHealth(Constants::PLAYER_HEALTH);
        $this->player->setLuck(Constants::PLAYER_LUCK);
        $this->player->setSpeed(Constants::PLAYER_SPEED);
        $this->player->setStrength(Constants::PLAYER_STRENGTH);
    }

    public function testPlayerNameIsSettedProperly() : void {
        $this->assertEquals(Constants::PLAYER_NAME, $this->player->getName());
    }

    public function testPlayerDefenceIsSettedProperly() : void {
        $this->assertEquals(Constants::PLAYER_DEFENCE, $this->player->getDefence());
    }

    public function testPlayerHealthIsSettedProperly() : void {
        $this->assertEquals(Constants::PLAYER_HEALTH, $this->player->getHealth());
    }

    public function testPlayerLuckIsSettedProperly() : void {
        $this->assertEquals(Constants::PLAYER_LUCK, $this->player->getLuck());
    }

    public function testPlayerSpeedIsSettedProperly() : void {
        $this->assertEquals(Constants::PLAYER_SPEED, $this->player->getSpeed());
    }

    public function testPlayerStrengthIsSettedProperly() : void {
        $this->assertEquals(Constants::PLAYER_STRENGTH, $this->player->getStrength());
    }

}