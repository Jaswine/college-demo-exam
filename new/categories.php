<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Товары</title>

    <link rel="stylesheet" href="./styles/main.css">
</head>
<body>


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
            <button class="btn">Корзина</button>
            <span>demo@main.ru</span>
        </div>

    </header>

    <!-- Контент -->
    <div class="content">

    <!-- Категории -->
    <div class="pre__categories">
        <h1>Категория товаров</h1>

        <!-- !!!! СОРТИРОВКА !!!! -->
        <div class="categories__filters">
            <a class="btn" href="?sort=price">По цене</a>
            <a class="btn" href="?sort=popular">По популярности</a>
        </div>

        <div class="categories">

        
        <?php
            // Подключение бд
            require_once 'config.php';

            // Получаем переменную sort, что мы указываем чуть выше в categories__filters (в href)
            $sort = $_GET['sort'] ?? 'default';

            // Взятие продуктов и сортировка
            if ($sort === 'price') {
                $stmt = $pdo->query("SELECT * FROM Product ORDER BY price ASC");
            } elseif ($sort === 'popular') { 
                // Так как я не делал поле views в таблице продуктов, мне 
                // некуда записывать просмотры и я просто сортирую по дате создания
                $stmt = $pdo->query("SELECT * FROM Product ORDER BY created_at DESC");
            } else {
                $stmt = $pdo->query("SELECT * FROM Product");
            }

            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Вывод всех продуктов
            foreach ($products as $product):
        ?>

            <div class="category">
                <img src="<?= $product["image_path"] ?>" alt="">
                <h3 class="title"><?= $product["title"] ?></h3>
                <div class="category__info">
                    <span><?= $product["price"] ?> тг</span>
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