<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>

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

     <!-- Контент -->
    <div class="content">

    <!-- Корзина -->
    <div class="basket">
        <h1>Корзина</h1>

        <!-- Список товаров в корзине -->
        <div class="basket__items">

            <div class="basket__item">
                <div class="basket__item__left">
                        <img src="https://images.pexels.com/photos/10986584/pexels-photo-10986584.jpeg" alt="">
                        <h3>Сувенир 1</h3>
                </div>
                <div class="basket__item__right">
                    <span>500 тг</span>
                </div>
            </div>
            
        </div>

        <div class="basket__footer">
            <div class="basket__footer__total_sum">
                Общая сумма: 500 тг
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