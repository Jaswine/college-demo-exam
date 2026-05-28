
# Аутентификация 

Проверка того что пользователь зарегистрирован и показывать или же не показывать ему какие-то страницы из-за этого

1. Добавить функцию проверки -  если пользователь не вошёл → кидаем на login

```php
    // Подключение бд
    require_once 'config.php';

    function isLoggedIn() {
        // Импортирование переменной в которую мы назначали бд в config.php
        global $pdo;

        // Проверяем что session с user_email существует
        if (!isset($_SESSION['user_email'])) {
            header("Location: login.php");
        }
        // Взятие email пользователя из сессии, если тот там сохранен
        $user_email = $_SESSION['user_email'];

        // Взятие пользователя из бд
        $stmt = $pdo->prepare("SELECT * FROM User WHERE email = ?");
        $stmt->execute([$user_email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            header("Location: login.php");
        }
        return $user;
    }
```

2. Переходим на страницы, что хотим ограничить для неавторизованных пользователей и добавляем логику

```php
    <?php
        // Активация сессий, чтобы PHP помнил пользователя между страницами    
        session_start();

        // Подключение Auth модуля
        require_once 'auth.php';

        # Вызов функции проверки -  пользователь вошёл или не вошёл
        isLoggedIn();
    ?>
```

3. Добавить функцию вывода текущего пользователя по сессии

```php
    ...

    function getCurrentUser() {
        // Импортирование переменной в которую мы назначали бд в config.php
        global $pdo;

        // Проверяем что session с user_email существует
         if (isset($_SESSION['user_email'])) {
            // Взятие email пользователя из сессии, если тот там сохранен
            $user_email = $_SESSION['user_email'];

            if ($user_email) {
                // Взятие пользователя
                $stmt = $pdo->prepare("SELECT * FROM User WHERE email = ?");
                $stmt->execute([$user_email]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user) {
                    return $user;
                }
            } 
        }
    }
```

2. Переходим на страницы, где мы хотим брать пользователя

```php 
     require_once("auth.php");  

    // Активация сессий, чтобы PHP помнил пользователя между страницами    
    session_start();

    // Взятие текущего пользователя из сессии
    $current_user = getCurrentUser();
```

и в шапку 

```html
    <div class="header__buttons">
        <!-- Проверка регистрации пользователя -->
        <?php if ($current_user): ?>
            <a class="btn" href="./basket.php">Корзина</a>
            <a class="link" href="./user.php"><?=$current_user["email"] ?></a>
        <?php else: ?>
            <a class="btn" href="./login.php">Войти</a>
        <?php endif; ?>
    </div>
```