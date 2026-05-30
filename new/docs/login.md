
## Реализация логин

1. Создать php тег, подключить конфиг с бд, прописать  session_start() для настройки сессии

    ```php
         <?php
            // Подключение бд
            require_once 'config.php';
            // Чтобы PHP помнил пользователя между страницами    
            session_start();
        ?>
    ```

2. Поставить тег **form** вместо div, где лежат поля

    ```php
         <form>
                <input type="email" required />
                <input type="password" required />

                <button>Продолжить</button>
         </form>
    ```

3. Добавить **method="post"** в форму для отправки формы; добавить **name="название поля"** к каждому полю, чтобы по ним передавать значения; добавить  **type="submit"** к button 

    ```php
        <form method="post">
            <input type="email" name="email" required />
            <input type="password" name="password" required />
    
            <button type="submit" >Продолжить</button>
        </form>
    ```

4. Добавить проверку метода, что это POST метод в php код, где импортировали config.php

    ```php
        require_once 'config.php';
        session_start();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

        }
    ```

5. Добавить переменные, что будут брать значение полей

```php
    require_once 'config.php';
    session_start();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        # В input пользователя добавить name="email"
        $email = $_POST['email'];
        # В input пользователя добавить name="password"
        $password = $_POST['password'];
    }
```

6. Добавить запрос к бд c взятием пользователя по email, для проверки его существования

```php
    require_once 'config.php';
    session_start();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        # В input пользователя добавить name="email"
        $email = $_POST['email'];
        # В input пользователя добавить name="password"
        $password = $_POST['password'];

        # Добавить type="submit" к button в форму и method="post" в форму, тег form
        $stmt = $pdo->query("SELECT * FROM User WHERE email = '$email'");
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    }
```

7. Проверка $user, создаем переменную $error и назначаем ей разные значения

```php
    require_once 'config.php';
    session_start();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        # В input пользователя добавить name="email"
        $email = $_POST['email'];
        # В input пользователя добавить name="password"
        $password = $_POST['password'];

        # Добавить type="submit" к button в форму и method="post" в форму, тег form
        $stmt = $pdo->query("SELECT * FROM User WHERE email = '$email'");
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $error = "";

        if (!$user) {
            $error = "Пользователь не найден";
        }
        else if ($password !== $user['password']) {
            $error = "Неверный пароль";
        }
        else {
            $_SESSION['email'] = $user['email'];

            header("Location: home.php");
            exit;
        }
    }
```

8. Добавляем вывод ошибки в форму

```php
    <form method="post">
        ...

        <?php if (!empty($error)): ?>
            <div style="color:red;">
                <?= $error ?>
            </div>
        <?php endif; ?>

    </form>   
```