<?php

namespace Game\util;

use Game\Model\Player;

/**
 * Class UtilFunctions
 * @package Game\util
 * This class is used to store some static helpers methods.
 */
class UtilFunctions {

    public static function tryYourLuck(int $luck) : bool {
        if(rand(0, 100) < $luck){
            return true;
        }
        return false;
    }

    public static function sortPlayersArray($players){
        uasort($players, array("Game\\util\\UtilFunctions", 'cmp'));
        return $players;
    }

    function cmp(Player $playerOne, Player $playerTwo){
        if($playerOne->getSpeed() == $playerTwo->getSpeed()) {
            if($playerOne->getLuck() == $playerTwo->getLuck()){
                return($playerOne > $playerTwo) ? -1 : 1;
            }
            return($playerOne->getLuck() > $playerTwo->getLuck()) ? -1 : 1;
        }
        return($playerOne->getSpeed() > $playerTwo->getSpeed()) ? -1 : 1;
    }
}