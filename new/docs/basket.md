
## Корзина

### Создание логики добавление продукта в корзину

1. Переходим в categories (также реализовать в home), переходим к выводу всех продуктов (там где foreach), заменяем просто button на форму с button и скрытым input, где лежат id

    ```php
        <!-- <button class="btn" type="submit">В корзину</button> -->
        <form method="POST">
            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
            <button class="btn" type="submit">В корзину</button>
        </form>
    ```

    ```php
        foreach ($products as $product):
        ?>

            <div class="category">
                <img src="<?= $product["image_path"] ?>" alt="">
                <h3 class="title"><?= $product["title"] ?></h3>
                <div class="category__info">
                    <span><?= $product["price"] ?> тг</span>

                    <!-- <button class="btn" type="submit">В корзину</button> -->

                    <form method="POST">
                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                        <button class="btn" type="submit">В корзину</button>
                    </form>

                </div>
            </div>
        <?php endforeach; ?>

    ```

2. Добавляем логику добавления в корзину до взятия и сортировки продуктов:

    ```php
        // Добавление продуктов в корзину
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $user_id = $current_user["id"];
            $product_id = $_POST["product_id"];

            $stmt = $pdo->prepare("INSERT INTO UserProduct (user_id, product_id) VALUES (?, ?)");
            $stmt->execute([$user_id, $product_id]);
        }
    ```


### Отображение корзины из бд

1. Взятие всех продуктов

    ```php
        // Взятие объектов из корзины
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
    ```

2. Вывод товаров

    ```php
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
                </div>
            </div>
            <?php endforeach ?>
            
        </div>
    ```

3. Вывести общую сумму всех продуктов из корзины

    ```php
        $total_sum = 0;
        foreach ($products as $product) {
            $total_sum += $product["price"];
        }
    ```

    ```php
        <div class="basket__footer">
            <div class="basket__footer__total_sum">
                Общая сумма: <?=$total_sum ?> тг
            </div>
        </div>
    ```


### Удаление продукта из корзины

1. Оборачиваем button формой (form), добавляем id

```php
    <!-- Кнопка удаления из корзины -->
    <form method="POST" class="category__info__button">
        <input type="hidden" name="user_product_id" value="<?= $product['user_product_id'] ?>">
        <button class="btn" type="submit">Удалить</button>
    </form>
``` 

```php
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
```

2. Добавление логики удаления из корзины

```php
    // Удаление продуктов из корзины
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $user_id = $current_user["id"];
        $user_product_id = $_POST["user_product_id"];

        $stmt = $pdo->query("DELETE FROM UserProduct WHERE id = '$user_product_id'");
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        header("Location: basket.php");
    }
```


### Вывод общей суммы в корзине

1. Пишем подсчет

```php
    $total_sum = 0;
    foreach ($products as $product) {
        $total_sum += $product["price"];
    }
```

2. Выводим

```php
    <div class="basket__footer">
        <div class="basket__footer__total_sum">
            Общая сумма: <?=$total_sum ?> тг
        </div>
    </div>
```
