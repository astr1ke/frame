<?php

namespace Core;

use SDK\Classes\CollectionMaker;
use SDK\Classes\CollectionObject;

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
        self::$mysqli->query('SET charset utf8');
    }

    static function closeBD(){
        self::$mysqli->close();
    }

    /**
     * Получение всех значений заданной модели
     * @return array
     */
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
        if (!isset($output)) $output = [];
        self::closeBD();

        $outputObject = new CollectionMaker($output);
        return $outputObject->getCollection();
    }

    /**
     * Получение одного экземпляра модели по заданному ID
     * @param $id
     * @param string $field
     * @return CollectionObject
     */
    static function find($id, $field = ''){
        if (self::check()){
            $table = self::$table;
        }
        self::connectBD();
        $query = 'SELECT * FROM ' . $table . ' WHERE ' . ($k = $field ?: 'ID') . ' = ' . '\'' . $id . '\'' . ' LIMIT 1';;
        $result = self::$mysqli->query($query);
        while ($row = $result->fetch_assoc()) {
            $output = $row;
        }
        if (!isset($output)) {
            $output = [];
        }
        self::closeBD();

        $newCollectionObject = new CollectionObject();
        foreach ($output as $key => $value) {
            $newCollectionObject->addField($key, $value);
        }

        return $newCollectionObject;
    }

    static function where($focus, $finding){
        if (self::check()){
            $table = self::$table;
        }
        self::connectBD();
        $query = 'SELECT * FROM ' . $table . ' WHERE ' . $focus . ' = ' . '\'' . $finding . '\'';
        $result = self::$mysqli->query($query);
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        if (!isset($output)) $output = [];
        self::closeBD();

        $newCollectionObject = new CollectionObject();
        foreach ($output as $key => $value) {
            $newCollectionObject->addField($key, $value);
        }

        return $newCollectionObject;
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

    static function delete($id){
        if (self::check()){
            $table = self::$table;
        }
        self::connectBD();
        $query = 'DELETE FROM ' . $table . ' WHERE ID = ' . '\'' . $id . '\'';
        self::$mysqli->query($query);
        self::closeBD();
    }

    static function query($query){
        self::connectBD();
        $result = self::$mysqli->query($query)?:[];
        self::closeBD();
        return $result;
    }

    static function findLike($focus, $field, $table = ''){
        if (self::check()){
            $table = self::$table;
        }
        $table = $table ?: self::$table;
        self::connectBD();
        $query = 'SELECT * FROM ' . $table . ' WHERE ' . $field . ' LIKE ' . '\'%' . $focus . '%\'';
        $result = self::$mysqli->query($query);
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        if (!isset($output)) $output = [];
        self::closeBD();

        $outputObject = new CollectionMaker($output);;
        return $outputObject->getCollection();
    }

    /**
     * @param $fieldToSort
     * @param bool $sortMethod
     * @return CollectionObject
     */
    static function orderBy ($fieldToSort, $sortMethod = false) {
        if (self::check()){
            $table = self::$table;
        }
        self::connectBD();
        $query = 'SELECT * FROM ' . $table;
        $result = self::$mysqli->query($query);
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        if (!isset($output)) $output = [];
        self::closeBD();

        $output = self::_customMultiSort($output, $fieldToSort);
        if ($sortMethod == 'DESC') {
            $output = array_reverse($output);
        }
        $outputObject = new CollectionMaker($output);;
        return $outputObject->getCollection();
    }

    /**
     * Сортируем многомерный массив по значению вложенного массива
     * @param $array array многомерный массив который сортируем
     * @param $field string название поля вложенного массива по которому необходимо отсортировать
     * @return array отсортированный многомерный массив
     */
    private static function _customMultiSort($array, $field) {
        $sortArr = array();
        foreach($array as $key => $val){
            $sortArr[$key] = $val[$field];
        }

        array_multisort($sortArr, $array);
        return $array;
    }
}
