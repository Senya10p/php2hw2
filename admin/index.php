<?php

//6. Админ-панель

require __DIR__ . '/../autoload.php';

$data = \App\Models\Article::findAll(); //Получаем все новости

include __DIR__ . '/../templates/admin.php'; //подключаем шаблон