<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Новость</title>
</head>
<body>
    <h1>PHP-2</h1>
    <h2>1 урок</h2>
    <h2>Модели данных и ООП</h2>
    <h4>Домашняя работа</h4>
    <h2>Новости</h2>

    <h3><?php echo $article->getHeader(); ?></h3>
    <article><?php echo $article->getText(); ?></article>
    <p>Автор: <?php echo $article->getAuthor(); ?></p>
    <br><br>
    <a href="/index.php">Все новости</a>
</body>
</html>