<?php


namespace App;


class Session
{

    public function __construct()
    {
        session_start();
    }
    public function put($key,$val){
        if(!is_null($key)){
            $_SESSION[$key]=$val;
        }
    }
    public function terminate(){
        session_unset();
    }
    public function fetch($key){
        if(!is_null($key)){
            return $_SESSION[$key];
        }
    }

}