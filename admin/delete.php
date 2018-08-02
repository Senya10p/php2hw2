<?php

//Удаление новостей
require __DIR__ . '/../autoload.php';

if ( isset( $_POST['del'] ) ) {

    $data = \App\Models\Article::findById( $_POST['del'] );

    $data->delete();
}

header('Location: /admin/index.php');