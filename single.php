<?php
require("db.php");
if(!isset($_GET['item_id'])){
    echo "<script>
            alert('вы не выбрали товар!');
            location.href='index.php'
            </script>";
    exit();
}
$item_id=$_GET['item_id'];
$item=$db->query("SELECT * FROM items WHERE id=$item_id")->fetchAll(2);

if(count($item)>0){
    $item=$item[0];
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="single">
    <header>
        <a href="index.php">back</a>
    </header>
<main>
    <section class="info">
        <img src="<?=$item['photo'];?>" alt="item">
        <h1><?=$item['name'];?></h1>
        <p><?=$item['description'];?></p>
    </section>

    <section class="buy">
        <div class="amount">
            <button>+</button>
            <span>1</span>
            <button>-</button>
        </div>
        <h2>$<?=$item['price'];?></h2>
    </section>
</main>
</body>
</html>