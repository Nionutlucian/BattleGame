<?php

namespace Game\Controller;

use Game\Config\EmagiaBattleConfig;
use Game\Controller\Interfaces\Battable;
use Game\Model\Factory\PlayerFactory;
use Game\Util\Constants;
use Game\util\Printer;
use Game\util\UtilFunctions;

/**
 * Class EmagiaBattle
 * @package Game\Controller
 * This class is used to simulate our battle based on requirements.
 */
class EmagiaBattle implements Battable {

    private $playerOne;
    private $playerTwo;

    private $players;

    private $isFirstRun = true;

    public function __construct() {
        $this->playerOne = PlayerFactory::createPlayer(EmagiaBattleConfig::HERO_PROPERTIES["Type"]);
        $this->playerTwo = PlayerFactory::createPlayer(EmagiaBattleConfig::WILD_BEAST_PROPERTIES["Type"]);

        $this->populateObjectsProperties();
        $this->isFirstRun = false;

        //Populate players array and sort it for choose which player attack firstly
        $this->players = array($this->playerOne, $this->playerTwo);
        $this->players = UtilFunctions::sortPlayersArray($this->players);
    }

    public function play() {
        Printer::print(Constants::BATTLE_STARTS, $this->playerOne, $this->playerTwo,
                EmagiaBattleConfig::BATTLE_NAME);
        for($i = 0; $i < EmagiaBattleConfig::NO_ROUNDS; $i++){
            $this->populateObjectsProperties();

            Printer::print(Constants::ROUND_STARTS, $this->playerOne, $this->playerTwo,
                        EmagiaBattleConfig::BATTLE_NAME, $i + 1);

            if($i % 2 == 0){
                $attacker = array_values($this->players)[0];
                $attacker->attack();
            }else{
                $attacker = array_values($this->players)[1];
                $attacker->attack();
            }

            Printer::print(Constants::ROUND_ENDS, $this->playerOne, $this->playerTwo,
                EmagiaBattleConfig::BATTLE_NAME, $i + 1);

            //If no player wins declare draw
            if($i == 19){
                Printer::print(Constants::DRAW_RESULT, $this->playerOne, $this->playerTwo,
                    EmagiaBattleConfig::BATTLE_NAME, $i + 1);
            }

        }
    }

    public function populateObjectsProperties() {
        if($this->isFirstRun) {
            $this->playerOne->setName(EmagiaBattleConfig::HERO_PROPERTIES["Name"]);
            $this->playerOne->setHealth(rand(EmagiaBattleConfig::HERO_PROPERTIES["MinHealth"],
                                                EmagiaBattleConfig::HERO_PROPERTIES["MaxHealth"]));
            $this->playerOne->setRapidStrikeChance(EmagiaBattleConfig::HERO_PROPERTIES["RapidStrikeChance"]);
            $this->playerOne->setMagicShieldChance(EmagiaBattleConfig::HERO_PROPERTIES["MagicShieldChance"]);

            $this->playerTwo->setName(EmagiaBattleConfig::WILD_BEAST_PROPERTIES["Name"]);
            $this->playerTwo->setHealth(rand(EmagiaBattleConfig::WILD_BEAST_PROPERTIES["MinHealth"],
                                                EmagiaBattleConfig::HERO_PROPERTIES["MaxHealth"]));

            $this->playerOne->setEnemyPlayer($this->playerTwo);
            $this->playerTwo->setEnemyPlayer($this->playerOne);

        }
        $this->playerOne->setStrength(rand(EmagiaBattleConfig::HERO_PROPERTIES["MinStrength"],
                                                EmagiaBattleConfig::HERO_PROPERTIES["MaxStrength"]));
        $this->playerOne->setDefence(rand(EmagiaBattleConfig::HERO_PROPERTIES["MinDefence"],
                                                EmagiaBattleConfig::HERO_PROPERTIES["MaxDefence"]));
        $this->playerOne->setSpeed(rand(EmagiaBattleConfig::HERO_PROPERTIES["MinSpeed"],
                                                EmagiaBattleConfig::HERO_PROPERTIES["MaxSpeed"]));
        $this->playerOne->setLuck(rand(EmagiaBattleConfig::HERO_PROPERTIES["MinLuck"],
                                                EmagiaBattleConfig::HERO_PROPERTIES["MaxLuck"]));


        $this->playerTwo->setStrength(rand(EmagiaBattleConfig::WILD_BEAST_PROPERTIES["MinStrength"],
                                                EmagiaBattleConfig::HERO_PROPERTIES["MaxStrength"]));
        $this->playerTwo->setDefence(rand(EmagiaBattleConfig::WILD_BEAST_PROPERTIES["MinDefence"],
                                                EmagiaBattleConfig::HERO_PROPERTIES["MaxDefence"]));
        $this->playerTwo->setSpeed(rand(EmagiaBattleConfig::WILD_BEAST_PROPERTIES["MinSpeed"],
                                                EmagiaBattleConfig::HERO_PROPERTIES["MaxSpeed"]));
        $this->playerTwo->setLuck(rand(EmagiaBattleConfig::WILD_BEAST_PROPERTIES["MinLuck"],
                                                EmagiaBattleConfig::WILD_BEAST_PROPERTIES["MaxLuck"]));
        }
}