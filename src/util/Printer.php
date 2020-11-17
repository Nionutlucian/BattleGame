<?php


namespace Game\util;

use Game\Model\Player;

/**
 * Class Printer
 * @package Game\util
 * This class is used to print the battle messages based on an action
 */
class Printer{

    public static function print(string $action, Player $attacker, Player $defender,
                                 $battleName = null, $roundIndex = null, $damage = null){
        switch ($action){
            case Constants::PLAYER_ATTACK:
                echo "♦ The " . $attacker->getName() . " start attack. ";
                Printer::newLine();
                break;
            case Constants::PLAYER_DEFEND:
                echo "♦ The " . $defender->getName() . " start defending. ";
                Printer::newLine();
                break;
            case Constants::PLAYER_GIVE_DAMAGE:
                echo "♦ The " . $attacker->getName() . " attacks with " .
                    $damage . " damage. " .
                    Printer::printStats($attacker, $defender);
                    Printer::newLine();
                break;
            case Constants::DEFENDER_IS_DEAD:
                echo "♦ The " . $attacker->getName() . " attacks with " .
                    $damage . " damage. " .
                    $defender->getName() . " is dead!";
                Printer::newLine();
                Printer::spanLine();
                break;
            case Constants::PLAYER_MISS:
                echo "♦ The " . $defender->getName() . " was lucky. " .
                    "The " . $attacker->getName() . " missed. " .
                     Printer::printStats($attacker, $defender);
                     Printer::newLine();
                break;
            case Constants::PLAYER_RAPID_STRIKE:
                echo "♦ The " . $attacker->getName() . " was lucky, he hit with " .
                    $damage . " damage " .
                     "using rapid strike skill. ";
                     Printer::newLine();
                break;
            case Constants::PLAYER_MAGIC_SHIELD:
                echo "♦ The " . $defender->getName() . " was lucky, he receive just " .
                    $damage . " damage " .
                    "using magic shield skill. ";
                Printer::newLine();
                break;
            case Constants::BATTLE_STARTS:
                echo "<b> The battle starts. Today we will watch the " . $battleName . " between " .
                        $attacker->getName() . " and the " . $defender->getName() . " . </b>";
                Printer::newLine();
                Printer::spanLine();
                break;
            case Constants::ROUND_STARTS:
                if($roundIndex == 1) {
                    echo "♦ The 1st round starts.";
                }elseif ($roundIndex == 2) {
                    echo "♦ The 2nd round starts.";
                }elseif ($roundIndex == 3) {
                    echo "♦ The 3rd round starts.";
                }else{
                    echo "♦ The " . $roundIndex . "th round starts.";
                }
                Printer::newLine();
                break;
            case Constants::ROUND_ENDS:
                if($roundIndex == 1) {
                    echo "♦ The 1st round ends.";
                }elseif ($roundIndex == 2) {
                    echo "♦ The 2nd round ends.";
                }elseif ($roundIndex == 3) {
                    echo "♦ The 3rd round ends.";
                }else{
                    echo "♦ The " . $roundIndex . "th round ends.";
                }
                Printer::newLine();
                Printer::spanLine();
                break;
            case Constants::DRAW_RESULT:
                echo "The battle is over. The two players drew";
                Printer::newLine();
                break;
            case Constants::BATTLE_FINISHED:
                echo "<b>The battle is over. " . $attacker->getName() . " wins the game!</b>";
                Printer::newLine();
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