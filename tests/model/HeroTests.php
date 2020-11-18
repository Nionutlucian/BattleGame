<?php


namespace model;


use Game\Model\Hero;
use Game\Model\Player;
use Game\Util\Constants;
use Monolog\Test\TestCase;

class HeroTests extends TestCase {

    private $playerOne;

    public function setUp() {
        parent::setUp();

        $this->playerOne = new Hero();
        $this->playerOne->setName(Constants::PLAYER_NAME);
        $this->playerOne->setDefence(Constants::PLAYER_DEFENCE);
        $this->playerOne->setHealth(Constants::PLAYER_HEALTH);
        $this->playerOne->setLuck(Constants::PLAYER_LUCK);
        $this->playerOne->setSpeed(Constants::PLAYER_SPEED);
        $this->playerOne->setStrength(Constants::PLAYER_STRENGTH);
        $this->playerOne->setMagicShieldChance(Constants::HERO_MAGIC_SHIELD_CHANGE);
        $this->playerOne->setRapidStrikeChance(Constants::HERO_RAPID_STRIKE_CHANCE);
    }

    public function testHeroMagicShieldChanceIsSettedProperly() : void {
        $this->assertEquals(Constants::HERO_MAGIC_SHIELD_CHANGE, $this->playerOne->getMagicShieldChance());
    }

    public function testHeroRapidStrikeChanceIsSettedProperly() : void {
        $this->assertEquals(Constants::HERO_RAPID_STRIKE_CHANCE, $this->playerOne->getRapidStrikeChance());
    }
}