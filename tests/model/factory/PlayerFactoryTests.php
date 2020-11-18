<?php

namespace model\factory;

use Game\Config\EmagiaBattleConfig;
use Game\Model\Factory\PlayerFactory;
use Game\Model\Hero;
use Game\Model\Player;
use Monolog\Test\TestCase;

class PlayerFactoryTests extends TestCase {

    private $playerOne;
    private $playerTwo;

    public function setUp() {
        $this->playerOne = PlayerFactory::createPlayer(EmagiaBattleConfig::HERO_PROPERTIES["Type"]);
        $this->playerTwo = PlayerFactory::createPlayer(EmagiaBattleConfig::WILD_BEAST_PROPERTIES["Type"]);
    }

    public function testPlayerOneIsHero(){
        $this->assertTrue($this->playerOne instanceof Hero);
    }

    public function testPlayerTwoIsPlayer(){
        $this->assertTrue($this->playerTwo instanceof Player);
    }
}