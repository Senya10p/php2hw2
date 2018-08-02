<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Новости</title>
</head>
<body>
    <h1>PHP-2</h1>
    <h2>1 урок</h2>
    <h2>Модели данных и ООП</h2>
    <h4>Домашняя работа</h4>
    <h2>Новости</h2>

    <?php
    foreach ( $data as $article ) {
        ?>
        <a href="/article.php?id=<?php echo $article->getId(); ?>"><h3><?php echo $article->getHeader(); ?></h3></a>
        <p><?php echo $article->getText(); ?></p>
        <hr>
    <?php } ?>

</body>
</html>