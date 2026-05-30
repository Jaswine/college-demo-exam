
<?php
    // Подключение бд
    require_once 'config.php';

    // Если пользователь не вошёл → кидаем на login
    function isLoggedIn() {
        # Импортирование переменной в которую мы назначали бд в config.php
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


    // Берем текущего пользователя по сессии
    function getCurrentUser() {
        global $pdo;

         if (isset($_SESSION['user_email'])) {
            // Взятие email пользователя из сессии, если тот там сохранен
            $user_email = $_SESSION['user_email'];

            if ($user_email) {
                // Взятие пользователя
                $stmt = $pdo->prepare("SELECT * FROM User WHERE email = ?");
                $stmt->execute([$user_email]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user) {
                    echo $user["id"];
                    return $user;
                }
            } 
        }
    }

?>