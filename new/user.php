<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пользователь</title>
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
            <?php if ($current_user): ?>
                <a class="btn" href="./basket.php">Корзина</a>
                <a class="link" href="./user.php"><?=$current_user["email"] ?></a>
            <?php else: ?>
                <a class="btn" href="./login.php">Войти</a>
            <?php endif; ?>
        </div>

    </header>

    <div class="content">

    <div class="profile">
        <h2>Demo Demo</h2>
        <p><span>demo@mail.ru</span> <span>+1(111)111-11-11</span></p>
        <p>London, UK 847 Jewess Bridge Apt. 174 474-769-3919</p>
    </div>

    <div class="profile__orders">
        <h1>Список заказов пользователя</h1>
        <h3>Открытые заказы</h3>
        <div class="profile__orders__list">

            <div class="profile__order profile__order__open">
                <div class="profile__order__left">
                     <h4>Наименование: Demo Demo</h4>
                    <p>Дата заказа: 25 Марта, 2024 Дата заказа: 6 апреля, 2024</p>
                </div>
                <div class="profile__order__right">
                    <button class="btn">Отменить</button>
                </div>
            </div>

        </div>

        <h3>Закрытые заказы</h3>
         <div class="profile__orders__list">

            <div class="profile__order">
                <h4>Номер заказа 2</h4>
                <p>Дата заказа: 25 Марта, 2024 Дата заказа: 6 апреля, 2024</p>
            </div>

             <div class="profile__order">
                <h4>Номер заказа 3</h4>
                <p>Дата заказа: 25 Марта, 2024 Дата заказа: 6 апреля, 2024</p>
            </div>

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