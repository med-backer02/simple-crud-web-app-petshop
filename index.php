<?php
require("db.php");
$categories = $db->query('SELECT * FROM categories')->fetchAll(2);
$products = $db->query('SELECT * FROM items')->fetchAll(2);

if (isset($_GET['category'])) {
    $category_id=$_GET['category'];
    $products = $db->query("SELECT * FROM items WHERE category=$category_id")->fetchAll(2);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header><h1>Little’ Petshop</h1></header>

<main>
    <section class="filters">
        <?php foreach ($categories as $category): ?>
            <a href="?category=<?= $category['id']; ?>"
                <?php if (isset($_GET['category']) && $_GET['category'] == $category['id']) echo 'class="selected"'; ?>
            ><?= $category['name']; ?></a>
        <?php endforeach; ?>
    </section>
    <section class="container">
        <h2>Popular items</h2>
        <?php foreach ($products as $item):?>
        <div class="item">
            <img src="<?=$item['photo'];?>" alt="photo" width="100">
            <h3><?=$item['name'];?></h3>
            <p>$<?=$item['price'];?></p>
            <a class="button" href="single.php?item_id=<?=$item['id'];?>">Подробнее</a>
        </div>
        <?php endforeach;?>
    </section>
</main>
</body>
</html>
