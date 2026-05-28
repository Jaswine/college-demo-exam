<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>

    <link rel="stylesheet" href="./styles/main.css">
</head>
<body>

    <?php
        // Подключение бд
        require_once 'config.php';
        // Чтобы PHP помнил пользователя между страницами    
        session_start();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            # В input пользователя добавить name="name"
            $name = $_POST['name'];
            # В input пользователя добавить name="email"
            $email = $_POST['email'];
            # В input пользователя добавить name="password"
            $password = $_POST['password'];

            # Ошибка, лежит в форме, под input-ами
            $error = "";

            # Добавить type="submit" к button в форму и method="post" в форму, тег form
            $stmt = $pdo->prepare("SELECT * FROM User WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                $error = "Пользователь уже существует";
            }
            else {
                $pdo->query("INSERT INTO User (name, email, password) VALUES ('$name', '$email', '$password')");    

                $_SESSION['user_email'] = $user['email'];

                header("Location: home.php");
            }
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
            <a class="btn" href="./login.php">Войти</a>
        </div>

    </header>

    <div class="content">

    <!-- Регистрация -->
    <div class="login">
        <div class="login__left">
            <img src="https://images.pexels.com/photos/27524189/pexels-photo-27524189.jpeg" alt="">
        </div>
        <form class="login__right" method="post">
            <h1>Регистрация</h1>

            <div class="form__field">
                <label>Name:</label>
                <input type="text" name="name" placeholder="" />
            </div>

            <div class="form__field">
                <label>Email:</label>
                <input type="email" name="email" placeholder="" />
            </div>
            
            <div class="form__field">
                <label>Password:</label>
                <input type="password" name="password" placeholder="" />
            </div>

            <?php if (!empty($error)): ?>
                <div style="color:red;">
                    <?= $error ?>
                </div>
            <?php endif; ?>

            <button class="btn" type="submit">Продолжить</button>

            <p>У вас уже есть аккаунт? <a href="">Войти</a></p>
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