<?php


namespace Game\util;


class UtilFunctions {

    public static function tryYourLuck(int $luck) : bool {
        if(rand(0, 100) < $luck){
            return true;
        }
        return false;
    }

}