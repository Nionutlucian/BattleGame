<?php

namespace Game\Model\Factory;

use Game\Model\Hero;
use Game\Model\Player;
use Game\Util\Constants;

/**
 * Class PlayerFactory
 * @package Game\Model\Factory
 * This class is used to create an object for us based on object type (HERO/REGULAR)
 * Add more objects type if you want to extend it
 */
class PlayerFactory {
    public static function createPlayer($playerType){
        if(strcasecmp($playerType, Constants::PLAYER_TYPE_HERO) == 0)
            return new Hero();
        else{
            return new Player();
        }
    }
}