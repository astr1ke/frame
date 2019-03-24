<?php

namespace SDK\Classes;

use SDK\Classes\CollectionObject;

class CollectionMaker
{
    private $outputData = array();

    public function __construct(array $inputData) {
        $this->_setVariables($inputData);
    }

    public function getCollection() {
        $collectionObject = new CollectionObject();
        foreach ($this->outputData as $key => $value) {
            $collectionObject->addField($key, $value);
        }
        return $collectionObject;
    }

    private function _setVariables($inputData) {
        foreach ($inputData as $element) {
            if (is_array($element)){
                $newCollectionObject = new CollectionObject();
                foreach ($element as $key => $value) {
                    $newCollectionObject->addField($key, $value);
                }
                $this->outputData[] = $newCollectionObject;
            }
        }
    }
}