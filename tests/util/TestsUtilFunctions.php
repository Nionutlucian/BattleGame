<?php


namespace util;


use Game\Model\Player;
use Game\Util\Constants;
use Game\util\UtilFunctions;
use Monolog\Test\TestCase;

class TestsUtilFunctions extends TestCase {

    private Player $playerOne;
    private Player $playerTwo;
    private $players;

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
        $this->playerTwo->setName(Constants::PLAYER_NAME . "2");
        $this->playerTwo->setDefence(Constants::PLAYER_DEFENCE);
        $this->playerTwo->setHealth(Constants::PLAYER_HEALTH);
        $this->playerTwo->setLuck(Constants::PLAYER_LUCK + 1);
        $this->playerTwo->setSpeed(Constants::PLAYER_SPEED + 5);
        $this->playerTwo->setStrength(Constants::PLAYER_STRENGTH);

        $this->players = array($this->playerOne, $this->playerTwo);
    }

    public function testSortPlayersArrays(){
        $sortedPlayerArray = UtilFunctions::sortPlayersArray($this->players);
        self::assertEquals(Constants::PLAYER_NAME, array_values($sortedPlayerArray)[1]->getName());
    }

}