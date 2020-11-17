<?php

namespace Game\Controller;

use Game\Config\EmagiaBattleConfig;
use Game\Controller\Interfaces\Battable;
use Game\Model\Factory\PlayerFactory;

class EmagiaBattle implements Battable {

    private $playerOne;
    private $playerTwo;

    public function __construct() {
        $this->playerOne = PlayerFactory::createPlayer(EmagiaBattleConfig::HERO_PROPERTIES["Type"]);
        $this->playerTwo = PlayerFactory::createPlayer(EmagiaBattleConfig::WILD_BEAST_PROPERTIES["Type"]);
    }

    public function play() {
        for($i = 1; $i <= EmagiaBattleConfig::NO_ROUNDS; $i++){
            echo $i;
        }
    }

    public function populateObjectsProperties() {

    }
}