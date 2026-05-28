<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пользователь</title>
    <link rel="stylesheet" href="./styles/main.css">
</head>
<body>


    <!-- Header -->
    <header class="header">
        
        <div class="header__title">
            COMFY.
        </div>

        <div class="header__menu">
            <a href="">Главная</a>
            <a href="">Описание</a>
            <a href="">Категория</a>
            <a href="">Корзина</a>
        </div>

        <div class="header__buttons">
            <button class="btn">Корзина</button>
            <span>demo@main.ru</span>
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