<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>

    <link rel="stylesheet" href="./styles/main.css">
</head>
<body>

    <?php
        // Подключение бд
        require_once 'config.php';
        // Подключение Auth модуля
        require_once 'auth.php';

        // Активация сессий, чтобы PHP помнил пользователя между страницами    
        session_start();

        // Взятие текущего пользователя из сессии
        $current_user = getCurrentUser();
        isLoggedIn();

        // Взятие объектов из корзины
        $stmt = $pdo->prepare("
            SELECT
                p.*,
                up.id AS user_product_id
            FROM Product p
            INNER JOIN UserProduct up ON p.id = up.product_id
            INNER JOIN User u ON u.id = up.user_id
            WHERE u.email = ?
        ");
        $stmt->execute([$current_user["email"]]);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $total_sum = 0;
        foreach ($products as $product) {
            $total_sum += $product["price"];
        }

        // Удаление продуктов из корзины
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $user_id = $current_user["id"];
            $user_product_id = $_POST["user_product_id"];

            $stmt = $pdo->query("DELETE FROM UserProduct WHERE id = '$user_product_id'");
            $product = $stmt->fetch(PDO::FETCH_ASSOC);

            header("Location: basket.php");
        }

    ?>

    <!-- Header -->
    <header class="header">
        
        <div class="header__title">
            COMFY.
        </div>

        <div class="header__menu">
            <a href="./home.php">Главная</a>
            <a href="./home.php">Описание</a>
            <a href="./categories.php">Категория</a>
            <a href="./basket.php">Корзина</a>
        </div>

        <div class="header__buttons">
            <!-- Проверка регистрации пользователя -->
            <?php if ($current_user): ?>
                <a class="btn" href="./basket.php">Корзина</a>
                <a class="link" href="./user.php"><?=$current_user["email"] ?></a>
            <?php else: ?>
                <a class="btn" href="./login.php">Войти</a>
            <?php endif; ?>
        </div>

    </header>

     <!-- Контент -->
    <div class="content">

    <!-- Корзина -->
    <div class="basket">
        <h1>Корзина</h1>

        <!-- Список товаров в корзине -->
        <div class="basket__items">

            <?php foreach ($products as $product): ?>
                <div class="basket__item">
                    <div class="basket__item__left">
                        <img src="<?= $product["image_path"] ?>" alt="">
                        <h3><?= $product["title"] ?></h3>
                    </div>
                    <div class="basket__item__right">
                        <span><?= $product["price"] ?> тг</span>

                        <!-- Кнопка удаления из корзины -->
                        <form method="POST" class="category__info__button">
                            <input type="hidden" name="user_product_id" value="<?= $product['user_product_id'] ?>">
                            <button class="btn" type="submit">Удалить</button>
                        </form>
                    
                    </div>
                </div>
            <?php endforeach ?>
            
        </div>

        <div class="basket__footer">
            <div class="basket__footer__total_sum">
                Общая сумма: <?=$total_sum ?> тг
            </div>
        </div>
    </div>

    <!-- Форма отправки заказа -->
    <form action="">
        <h2>Отправить заказ</h2>

        <div class="form__item">

            <div class="form__field">
                <label for="">ФИО:</label>
                <input type="text" placeholder="ФИО" />
            </div>

             <div class="form__field">
                <label for="">Email:</label>
                <input type="text" placeholder="Email" />
            </div>

        </div>

         <div class="form__item">

            <div class="form__field">
                <label for="">Телефон:</label>
                <input type="text" placeholder="Телефон" />
            </div>

            <div class="form__field">
                <label for="">Адрес:</label>
                <input type="text" placeholder="Адрес" />
            </div>

        </div>

        <div class="form__field">
            <label for="">Выберите метод оплаты:</label>
            <select name="" id="">
                <option value="" selected disabled>Выберите метод оплаты</option>
                <option value="">Карта банка</option>
                <option value="">PayPal</option>
                <option value="">Наличкой по прибытию заказа</option>
            </select>
        </div>

        <button class="btn">Отправить</button>

    </form>

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