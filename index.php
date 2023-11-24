<?php
    require("db.php");
?>
<<!doctype html>
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
    <header><h1>Little’  Petshop</h1></header>

<main>
    <section class="filters">
        <a href="#food">Food</a>
        <a href="#accessories">accessories</a>
    </section>
    <section class="container">
        <h2>Popular items</h2>
        
        <div class="item">
            <img src="" alt="photo" width="100">
            <h3>name</h3>
            <p>$19</p>
            <a class="button" href="single.php">Подробнее</a>
        </div>
    </section>
</main>
</body>
</html>
