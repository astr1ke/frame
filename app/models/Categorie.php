<?php
/*
 * Модель Категорий.
 * В объекте $table задается имя таблицы в базе
 */

namespace Models;

use Core\Model;

class Categorie {
    use Model;
    static $table = 'categories';

}