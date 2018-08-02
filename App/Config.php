<?php

namespace App;

class Config //1. Добавляем класс App\Config.
{
    public $data;

    protected static $conf;

    protected function __construct()
    {
        $this->data = require __DIR__ . '/../config.php';
    }

    public static function instance() //7. Делаем класс синглтоном
    {
        if ( null === self::$conf ) {

            self::$conf = new self;
        }
        return self::$conf;
    }
}