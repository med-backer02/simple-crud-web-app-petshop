<?php
require("db.php");
if (!empty($_GET)) {

    if (isset($_GET['delete_cat'])) {
        $category_name = $_GET['cat_name'];
        $id = $_GET['id'];
        if ($db->query("DELETE FROM categories WHERE id=$id")) {
            echo "<script>
            alert('Удалено');
            location.href='admin.php';
            </script>";
            exit();
        } else {
            var_dump($db->errorInfo());
        }
    }

    if (isset($_GET['new_cat'])) {
        $new_category_name = $_GET['new_cat'];
        if ($db->query("INSERT INTO categories(name) VALUES ('$new_category_name')")) {
            echo "<script>
            alert('Добавлено');
            location.href='admin.php';
            </script>";
            exit();
        } else {
            var_dump($db->errorInfo());
        }
    }

    if (isset($_GET['cat_name'])) {
        $category_name = $_GET['cat_name'];
        $id = $_GET['id'];
        if ($db->query("UPDATE categories SET name='$category_name' WHERE id=$id")) {
            echo "<script>
            alert('Обновлено');
            location.href='admin.php';
            </script>";
            exit();
        } else {
            var_dump($db->errorInfo());
        }
    }

    if (isset($_GET['delete_item'])) {
        $category_name = $_GET['item_name'];
        $id = $_GET['id'];
        if ($db->query("DELETE FROM items WHERE id=$id")) {
            echo "<script>
            alert('Удалено');
            location.href='admin.php';
            </script>";
            exit();
        } else {
            var_dump($db->errorInfo());
        }
    }

    if (isset($_GET['new_item_name'])) {
        $new_item_name = $_GET['new_item_name'];
        $photo = $_GET['photo'];
        $description = $_GET['description'];
        $price = $_GET['price'];
        $category = $_GET['category'];
        if ($db->query("INSERT INTO items(name,photo,description,price,category) VALUES ('$new_item_name',
                                                                 '$photo','$description',
                                                                 $price,$category)")) {
            echo "<script>
            alert('Добавлено');
            location.href='admin.php';
            </script>";
            exit();
        } else {
            var_dump($db->errorInfo());
        }
    }

    if (isset($_GET['item_name'])) {
        $item_name = $_GET['item_name'];
        $photo = $_GET['photo'];
        $description = $_GET['description'];
        $price = $_GET['price'];
        $category = $_GET['category'];
        $id=$_GET['id'];
        if ($db->query("UPDATE items SET name='$item_name',photo='$photo',
                 description='$description',price=$price,category=$category WHERE id=$id")) {
            echo "<script>
            alert('Обновлено');
            location.href='admin.php';
            </script>";
            exit();
        } else {
            var_dump($db->errorInfo());
        }
    }
}

$categories = $db->query("SELECT * FROM categories")->fetchAll(2);
$products = $db->query("SELECT * FROM items")->fetchAll(2);
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
<body>
<h1>Панель администратора</h1>
<main>
    <section class="categories">
        <h2>Категории</h2>
        <div class="container">
            <form action="#" class="item">
                <label>
                    Название
                    <input type="text" name="new_cat" required>
                </label>
                <button>Добавить</button>
            </form>
            <?php foreach ($categories as $category): ?>
                <form action="#" class="item">
                    <label>
                        Название
                        <input type="text" name="cat_name" value="<?= $category['name']; ?>">
                        <input type="hidden" name="id" value="<?= $category['id']; ?>">
                    </label>
                    <button>Обновить</button>
                    <button name="delete_cat">Удалить</button>
                </form>
            <?php endforeach; ?>
        </div>

    </section>
    <section class="categories">
        <h2>Товары</h2>
        <div class="container">
            <form action="#" class="item">

                <label>
                    Название
                    <input type="text" name="new_item_name" required>
                </label>

                <label>
                    ссылка на фото
                    <input type="text" name="photo" required>
                </label>

                <label>
                    Описание
                    <textarea name="description" required></textarea>
                </label>

                <label>
                    Цена
                    <input type="text" name="price" required>
                </label>

                <label>
                    <select name="category">
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <button>Добавить</button>

            </form>
            <?php foreach ($products as $item): ?>
                <form action="#" class="item">
                    <img src="<?= $item['photo']; ?>" alt="">
                    <label>
                        Название
                        <input type="text" name="item_name" value="<?= $item['name']; ?>" required>
                    </label>

                    <label>
                        ссылка на фото
                        <input type="text" name="photo" value="<?= $item['photo']; ?>">
                    </label>

                    <label>
                        Описание
                        <textarea name="description"><?= $item['description']; ?></textarea>
                    </label>

                    <label>
                        Цена
                        <input type="text" name="price" value="<?= $item['price']; ?>">
                    </label>

                    <label>
                        <select name="category">
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category['id']; ?>"
                                <?php if ($item['category']==$category['id']) echo "selected";?>
                                >
                                    <?= $category['name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                    <button>Обновить</button>
                    <button name="delete_item">Удалить</button>
                </form>
            <?php endforeach; ?>
        </div>
    </section>
</main>
</body>
</html>
