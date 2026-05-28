<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Логин</title>

    <link rel="stylesheet" href="./styles/main.css">
</head>
<body>

    <?php
        // Подключение бд
        require_once 'config.php';

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            # В input пользователя добавить name="email"
            $email = $_POST['email'];
            # В input пользователя добавить name="password"
            $password = $_POST['password'];

            # Ошибка, лежит в форме, под input-ами
            $error = "Error";

            # Добавить type="submit" к button в форму
            $stmt = $pdo->prepare("SELECT * FROM User WHERE email = ?");
            $stmt->execute([$email]);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                $error = "Пользователь не найден";
            }

            if ($password != $user['password']) {
                $error = "Неверный пароль";
            }

            // создаём сессию
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];

            echo "Вы вошли!";
        }
    ?>


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
            <button class="btn">Войти</button>
        </div>

    </header>

    <div class="content">

    <!-- Логин -->
    <div class="login">
        <div class="login__left">
            <img src="https://images.pexels.com/photos/14133592/pexels-photo-14133592.jpeg" alt="">
        </div>
        <form class="login__right">
            <h1>Вход</h1>

            <div class="form__field">
                <label for="">Email:</label>
                <input type="email" name="email" placeholder="" required />
            </div>

            
            <div class="form__field">
                <label for="">Password:</label>
                <input type="password" name="password" placeholder="" required />
            </div>

            <!-- Ошибка -->
                    <?= $error ?>
          

            <!-- ВАЖНЫЙ type="submit" -->
            <button type="submit" class="btn">Продолжить</button>

            <p>У вас нет аккаунта? <a href="">Регистрация</a></p>
        </form>
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