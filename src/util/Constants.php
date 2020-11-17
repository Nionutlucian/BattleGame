<?php

namespace Game\Util;

class Constants
{
    //Constants used in tests
    const PLAYER_NAME = "TestPlayer";
    const PLAYER_HEALTH = 70;
    const PLAYER_STRENGTH = 60;
    const PLAYER_DEFENCE = 50;
    const PLAYER_SPEED = 40;
    const PLAYER_LUCK = 10;

    //Exception messages
    const GENERAL_EXCEPTION_MESSAGE = "An exception occured!";

    //Player actions
    const PLAYER_ATTACK = "attack";
    const PLAYER_GIVE_DAMAGE = "giveDamage";
    const DEFENDER_IS_DEAD = "defenderIsDead";
    const PLAYER_MISS = "playerMiss";
    const PLAYER_DEFEND = "defend";
    const PLAYER_RAPID_STRIKE = "rapidStrike";
    const PLAYER_MAGIC_SHIELD = "magicShield";

    //Battle actions
    const BATTLE_STARTS = "battleStarts";
    const ROUND_STARTS = "roundStarts";
    const ROUND_ENDS = "roundEnds";
    const DRAW_RESULT = "drawResult";
    const BATTLE_FINISHED = "battleFinished";

    //Type of players
    const PLAYER_TYPE_HERO = "Hero";
    const PLAYER_TYPE_REGULAR = "RegularPlayer";

}