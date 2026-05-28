<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>

    <link rel="stylesheet" href="./styles/main.css">
    
</head>
<body>

    <?php
        // Подключение бд
        require_once 'config.php';

        // Взятие всех продуктов
        $stmt = $pdo->query("SELECT * FROM Product");
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <!-- Header -->
    <header class="header">
        
        <div class="header__title">
            COMFY.
        </div>

        <div class="header__menu">
            <a href="./home.html">Главная</a>
            <a href="./home.html">Описание</a>
            <a href="./categories.html">Категория</a>
            <a href="./basket.html">Корзина</a>
        </div>

        <div class="header__buttons">
            <button class="btn">Выйти</button>
        </div>

    </header>

    <div class="content">
        <!-- Краткая информация -->
        <div class="intro">
            <img src="https://images.pexels.com/photos/27524189/pexels-photo-27524189.jpeg" alt="image">
            <div class="intro__content">
                <h2>Краткая информация</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis nostrum corrupti doloremque sequi, vero sapiente totam iste. Reprehenderit nam voluptatibus nobis officiis earum repudiandae, illum praesentium! Hic, nostrum! Modi, tempore?</p>
            </div>
        </div>

        <!-- Категории -->
        <div class="pre__categories">
            <h1>Категория товаров</h1>

            <div class="categories">

                <?php foreach ($products as $product): ?>
                    <div class="category">
                        <img src="<?= $product['image_path'] ?>" alt="">
                        <h3 class="title"><?= $product['title'] ?></h3>
                        <div class="category__info">
                            <span><?= $product['price'] ?> тг</span>
                            <button class="btn">В корзину</button>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
    </div>
    </div>

    <!-- Нижний блок -->
    <footer class="footer">
        <div class="footer__left">
            <a href="">Facebook</a>
            <a href="">Instagram</a>
            <a href="">Pinterest</a>
            <a href="">Telegram</a>
        </div>
        <div class="footer__right">
            <p>+1(111)111-11-11</p>
        </div>
    </footer>
    
</body>
</html> 