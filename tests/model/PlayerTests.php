<?php


namespace model;

use Game\Model\Player;
use Game\Util\Constants;
use PHPUnit\Framework\TestCase;

class PlayerTests extends TestCase{

    private Player $playerOne;
    private Player $playerTwo;

    public function setUp() {
        parent::setUp();

        $this->playerOne = new Player();
        $this->playerOne->setName(Constants::PLAYER_NAME);
        $this->playerOne->setDefence(Constants::PLAYER_DEFENCE);
        $this->playerOne->setHealth(Constants::PLAYER_HEALTH);
        $this->playerOne->setLuck(Constants::PLAYER_LUCK);
        $this->playerOne->setSpeed(Constants::PLAYER_SPEED);
        $this->playerOne->setStrength(Constants::PLAYER_STRENGTH);

        $this->playerTwo = new Player();
        $this->playerTwo->setName(Constants::PLAYER_NAME);
        $this->playerTwo->setDefence(Constants::PLAYER_DEFENCE);
        $this->playerTwo->setHealth(Constants::PLAYER_HEALTH);
        $this->playerTwo->setLuck(Constants::PLAYER_LUCK);
        $this->playerTwo->setSpeed(Constants::PLAYER_SPEED);
        $this->playerTwo->setStrength(Constants::PLAYER_STRENGTH);
        $this->playerTwo->setEnemyPlayer($this->playerOne);
        $this->playerOne->setEnemyPlayer($this->playerTwo);
    }

    public function testPlayerNameIsSettedProperly() : void {
        $this->assertEquals(Constants::PLAYER_NAME, $this->playerOne->getName());
    }

    public function testPlayerDefenceIsSettedProperly() : void {
        $this->assertEquals(Constants::PLAYER_DEFENCE, $this->playerOne->getDefence());
    }

    public function testPlayerHealthIsSettedProperly() : void {
        $this->assertEquals(Constants::PLAYER_HEALTH, $this->playerOne->getHealth());
    }

    public function testPlayerLuckIsSettedProperly() : void {
        $this->assertEquals(Constants::PLAYER_LUCK, $this->playerOne->getLuck());
    }

    public function testPlayerSpeedIsSettedProperly() : void {
        $this->assertEquals(Constants::PLAYER_SPEED, $this->playerOne->getSpeed());
    }

    public function testPlayerStrengthIsSettedProperly() : void {
        $this->assertEquals(Constants::PLAYER_STRENGTH, $this->playerOne->getStrength());
    }

    public function testAttack(){
        $this->playerOne->attack();
        $initialEnemyHealt = $this->playerTwo->getHealth();
        $damage = $this->playerOne->getStrength() - $this->playerTwo->getEnemyPlayer()->getDefence();
        $this->assertEquals($initialEnemyHealt - $damage, $this->playerTwo->getHealth());
    }

}