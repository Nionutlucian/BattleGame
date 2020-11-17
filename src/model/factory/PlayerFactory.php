<?php

namespace Game\Model\Factory;

use Game\Model\Hero;
use Game\Model\Player;
use Game\Util\Constants;

class PlayerFactory {
    public static function createPlayer($playerType){
        if(strcasecmp($playerType, Constants::PLAYER_TYPE_HERO) == 0)
            return new Hero();
        else{
            return new Player();
        }
    }
}