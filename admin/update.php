<?php

//Редактирование новостей
require __DIR__ . '/../autoload.php';

$data = \App\Models\Article::findById( $_POST['update'] );

$data->header = $_POST['header'];
$data->author = $_POST['author'];
$data->text = $_POST['text'];

$data->save(); //сохраняем данные

header('Location: /admin/index.php');