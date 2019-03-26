<?php

namespace SDK\Classes;

class ModelObject implements \Countable
{
    use \Core\ModelNonStatic;

    private $table;

    public function __construct($table) {
        $this->table = $table;
    }

    public function addField ($key, $value) {
        $this->$key = $value;
    }

    /**
     * Count elements of an object
     * @link https://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count() {
        $count = 0;
        foreach (get_object_vars($this) as $e) {
            $count++;
        };
        return $count;
    }

    public function where ($findingName, $findingValue) {
        $newObject = new ModelObject($this->table);
        foreach (get_object_vars($this) as $element) {
            if (is_object($element)) {
                if ($element->$findingName == $findingValue) {
                    $newObject->addField(rand(1, 1000), $element);
                }
            }
        }
        return $newObject;
    }
}