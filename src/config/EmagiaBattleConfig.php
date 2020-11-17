<?php

namespace Game\Config;

use Game\Util\Constants;

/**
 * Class EmagiaBattleConfig
 * In this class we store the configuration values for EmagiaBattle
 */
final class EmagiaBattleConfig {

    const NO_ROUNDS = 20;

    const BATTLE_NAME = "EmagiaBattle";

    const HERO_PROPERTIES = [
        "Type" => Constants::PLAYER_TYPE_HERO,
        "Name" => "Orderus",
        "MinHealth" => 70,
        "MaxHealth" => 100,
        "MinStrength" => 70,
        "MaxStrength" => 80,
        "MinDefence" => 45,
        "MaxDefence" => 55,
        "MinSpeed" => 40,
        "MaxSpeed" => 50,
        "MinLuck" => 10,
        "MaxLuck" => 30,
        "RapidStrikeChance" => 10,
        "MagicShieldChance" => 20
    ];

    const WILD_BEAST_PROPERTIES = [
        "Type" => Constants::PLAYER_TYPE_REGULAR,
        "Name" => "WildBeast",
        "MinHealth" => 60,
        "MaxHealth" => 90,
        "MinStrength" => 60,
        "MaxStrength" => 90,
        "MinDefence" => 40,
        "MaxDefence" => 60,
        "MinSpeed" => 40,
        "MaxSpeed" => 60,
        "MinLuck" => 25,
        "MaxLuck" => 40
    ];
}