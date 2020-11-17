<?php


namespace Game\util;


use Game\Model\Player;

class Printer{

    public static function print(string $action, Player $attacker, Player $defender){
        switch ($action){
            case Constants::PLAYER_ATTACK:
                echo "The " . $attacker->getName() . " start attack. ";
                Printer::newLine();
                break;
            case Constants::PLAYER_DEFEND:
                echo "The " . $defender->getName() . " start defending. ";
                Printer::newLine();
                break;
            case Constants::PLAYER_GIVE_DAMAGE:
                echo "The " . $attacker->getName() . " attacks with " .
                    ($attacker->getStrength() - $defender->getDefence()) . " damage. " .
                    Printer::printStats($attacker, $defender);
                    Printer::newLine();
                break;
            case Constants::PLAYER_MISS:
                echo "The " . $defender->getName() . " was lucky. " .
                    "The " . $attacker->getName() . " missed. " .
                     Printer::printStats($attacker, $defender);
                     Printer::newLine();
                break;
            case Constants::PLAYER_RAPID_STRIKE:
                echo "The " . $attacker->getName() . " was lucky, he hit with" .
                    (2 * ($attacker->getStrength() - $defender->getDefence())) . " damage " .
                     "using rapid strike skill. ";
                     Printer::printStats($attacker, $defender);
                     Printer::newLine();
                break;
            case Constants::PLAYER_MAGIC_SHIELD:
                echo "The " . $defender->getName() . " was lucky, he receive just" .
                    (($attacker->getStrength() - $defender->getDefence()) / 2) . " damage " .
                    "using magic shield skill. ";
                Printer::printStats($attacker, $defender);
                Printer::newLine();
                break;
            case Constants::BATTLE_STARTS:
                echo "The battle starts. Today we will watch the battle between " . $atacker
                break;
            default:
                echo "Unexpected action";
        }
    }

    private static function printStats(Player $atacker, Player $defender){
        if($defender->getHealth() > 0) {
            return $atacker->getName() . " health: " . $atacker->getHealth() .
                " , " . $defender->getName() . " health: " . $defender->getHealth();
        }
        return "";
    }

    private static function newLine(){
        echo "<br>";
    }

    private static function spanLine(){
        echo "<hr>";
    }

}