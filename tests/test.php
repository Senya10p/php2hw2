<?php
//3. файл test.php для проверки работоспособности

require __DIR__ . '/../autoload.php';

$db = new \App\Db();

$test = $db->execute( 'UPDATE news SET author = :a1 WHERE author = :a2 ', [':a1' => 'Мария' , ':a2' => 'Анна'] ); //3. Проверяем работоспособность
var_dump($test);

$data = \App\Models\Article::findById(1); //тестируем поиск по id
var_dump($data);