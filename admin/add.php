<?php

//Добавление новостей
require __DIR__ . '/../autoload.php';

if ( '' !== $_POST['header'] ) { //проверка введен ли заголовок
    if ( '' !== $_POST['text'] ) { //введён ли текст статьи

        $data = new App\Models\Article();

        $data->header = $_POST['header'];
        $data->text = $_POST['text'];

        $data->save(); //добавляет новую статью
    }
}

header('Location: /admin/index.php');