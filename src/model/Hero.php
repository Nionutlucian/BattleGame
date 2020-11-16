<?php


namespace Game\Model;


use Exception;

class Hero extends Player {

    public function __construct(){
        //Call parent constructor
        parent::_construct();
    }

    public function rapidStrike(){
        try {
            echo "Rapid Strick activated";
        }catch (Exception $e){
            var_dump($e->getMessage());
        }
    }

    public function magicSchield(){
        try {
            echo "Magic Schield activated";
        }catch (Exception $e){
            var_dump($e->getMessage());
        }
    }

}