<?php

namespace App\Models;

use App\Db;
use App\Model;

class Article extends Model //Создаём класс Article
{

    public $header;
    public $text;

    protected static $table = 'news'; //используем описание защищённого статического свойства

    public static function findLast(int $lim) //создаём описание метода для поиска последних записей из таблицы news
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY id DESC LIMIT ' . $lim;

        return $db->query( $sql, static::class );
    }
}