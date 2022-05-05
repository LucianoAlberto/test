<?php
class RolConPoderes {
    public static $rolConPoderes = "";

    public function set($data){
        return self::$global = $data;
    }

    public function get(){
        return self::$global;
    }
}
