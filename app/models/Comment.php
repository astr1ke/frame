<?php
/*
 * Модель Коментариев.
 * В объекте $table задается имя таблицы в базе
 */

namespace Models;

use Core\Model;

class Comment {
    use Model;
    static $table = 'comments';

}