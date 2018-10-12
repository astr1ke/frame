<?php

namespace vendor\base;

Trait Model {

    static $mysqli;


    static function check(){
        if (!isset(self::$table) or self::$table == '') {
            echo 'Не задана таблица БД для данной модели';
            exit();
        }else{
            return true;
        }
    }

    static function connectBD(){
        $db_config = require ROOT.'/config/BD.php';
        self::$mysqli = new \mysqli($db_config['ip'],$db_config['user'],$db_config['password'],$db_config['bd'],$db_config['port']);
    }

    static function closeBD(){
        self::$mysqli->close();
    }

    static function All(){
        if (self::check()){
            $table = self::$table;
        }
        self::connectBD();
        $query = 'SELECT * FROM ' . $table;
        $result = self::$mysqli->query($query);
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        self::closeBD();
        return $output;
    }

    static function find($id){
        if (self::check()){
            $table = self::$table;
        }
        self::connectBD();
        $query = 'SELECT * FROM ' . $table . ' WHERE ID = ' . $id . ' LIMIT 1';
        $result = self::$mysqli->query($query);
        while ($row = $result->fetch_assoc()) {
            $output = $row;
        }
        self::closeBD();
        return $output;
    }

    static function where($focus, $finding){
        if (self::check()){
            $table = self::$table;
        }
        self::connectBD();
        $query = 'SELECT * FROM ' . $table . ' WHERE ' . $focus . ' = ' . $finding;
        $result = self::$mysqli->query($query);
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        self::closeBD();
        return $output;
    }

    static function create($items){
        if (self::check()){
            $table = self::$table;
        }
        self::connectBD();
        $key = '';
        $value = '';
        foreach ($items as $k => $item){
            $key .= '' . $k . ', ';
            $value .= '\'' . $item . '\', ';
        }
        $query = 'INSERT INTO ' . $table . ' ( ' . rtrim($key,', ') . ' ) VALUES ( ' . rtrim($value,', ') . ' )';
        $result = self::$mysqli->query($query);
        self::closeBD();
        if ($result){
            return true;
        }
    }





}
