-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Июн 01 2024 г., 11:48
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `college-demo-exam`
--

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2024_05_31_064847_create_products_table', 1),
(4, '2024_05_31_064854_create_orders_table', 1),
(5, '2024_05_31_074612_create_product_users_table', 1),
(6, '2024_05_31_074855_create_order_products_table', 1),
(7, '2024_05_31_075945_create_order_users_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_data` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deliver_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivered_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `order_users`
--

CREATE TABLE `order_users` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image_path`, `price`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Americano', 'An Americano is a delightful coffee drink that we often recommend for those who enjoy their coffee strong but also a little milder than a straight espresso. Let\'s talk about how you get from beans to this classic drink.', 'https://cdn.shopify.com/s/files/1/1616/2815/files/Americano.jpg?v=1710465052', 7, 'coffee', NULL, NULL),
(2, 'Caffè Macchiato', 'Coffee lovers, let\'s talk about the classic Caffè Macchiato. It\'s one of the tastiest espresso drinks around. In Italian, \'macchiato\' means \'stained\' or \'spotted\'. This is a hint about how we make it.', 'https://cdn.shopify.com/s/files/1/1616/2815/files/Caffe_Macchiato.jpg?v=1710465080', 8, 'coffee', NULL, NULL),
(3, 'Cortado', 'Cortado comes from the Spanish verb \"cortar,\" meaning to cut. In our terms, that means cutting through the strong taste of espresso with warm milk.', 'https://cdn.shopify.com/s/files/1/1616/2815/files/Cortado_bd783242-6321-427f-8c01-36b448baca37.jpg?v=1710465182', 10, 'coffee\r\n', NULL, NULL),
(4, 'Espresso', 'When we think about traditional Italian coffee, espresso is usually the first thing that comes to mind. An espresso is a concentrated form of coffee, served in shots for that quick and powerful flavor punch. ', 'https://cdn.shopify.com/s/files/1/1616/2815/files/Espresso_ff045b45-38fd-4ec5-8867-4d84145e764c_480x480.jpg?v=1710465263', 8, 'coffee', NULL, NULL),
(5, 'Flat White', 'We often hear our friends from Australia and New Zealand raving about the flat white, and there\'s a good reason for it.', 'https://cdn.shopify.com/s/files/1/1616/2815/files/Flat_White.jpg?v=1710465315', 11, 'coffee', NULL, NULL),
(6, 'Latte', 'A latte is a beloved coffee drink that’s smooth and creamy. It’s an Italian classic that has become a morning favorite around the world.', 'https://cdn.shopify.com/s/files/1/1616/2815/files/Latte.jpg?v=1710465516', 9, 'coffee', NULL, NULL),
(7, 'Lungo', 'When we talk about Italian coffee, Lungo is a term you\'ll hear quite often. It\'s an espresso variation that means \"long\" in Italian. Lungo is similar to a regular espresso, but it\'s made with more water.', 'https://cdn.shopify.com/s/files/1/1616/2815/files/Lungo.jpg?v=1710465567', 7, 'coffee\r\n', NULL, NULL),
(8, 'Ristretto', 'When we make a Ristretto, we take espresso to a whole other level. It’s like our strong espresso\'s close cousin, but even more intense. ', 'https://cdn.shopify.com/s/files/1/1616/2815/files/Ristretto.jpg?v=1710465594', 13, 'coffee\r\n', NULL, NULL),
(9, 'Cold Brew', 'When we talk about Cold Brew, we\'re referring to a coffee brewing method that mixes ground coffee and cold water. It\'s a perfect summer drink because it\'s served with ice and has a smooth, mild flavor profile that we all enjoy on a hot day.', 'https://cdn.shopify.com/s/files/1/1616/2815/files/Cold_Brew_fdd29e46-1ae4-430c-bb12-74d9d28d412d.jpg?v=1710465617', 12, 'coffee', NULL, NULL),
(10, 'Frappuccino', 'A Frappuccino is a tasty blend of coffee or crème base mixed with ice and flavored syrup. It\'s a type of blended coffee drink made popular by Starbucks. When we create a Frappuccino.', 'https://cdn.shopify.com/s/files/1/1616/2815/files/frappuccino.jpg?v=1710465656', 17, 'coffee', NULL, NULL),
(11, 'Irish Coffee', 'Irish Coffee is a beloved warm cocktail that we think combines our two favorite things: coffee and whiskey. Making this drink is simple and enjoyable, perfect for a cozy evening or as a treat after a meal.', 'https://cdn.shopify.com/s/files/1/1616/2815/files/Mexican_Coffee.jpg?v=1710466016', 12, 'coffee', NULL, NULL),
(12, 'Iced Coffee', 'In the warm months, many of us look forward to sipping a cool, refreshing cup of iced coffee. It\'s one of our favorite summer beverages that\'s not only cooling but also packs the lively punch of coffee we love.', 'https://cdn.shopify.com/s/files/1/1616/2815/files/Iced_Coffee.jpg?v=1710465720', 12, 'coffee', NULL, NULL),
(13, 'Affogato', 'The Affogato is a classic Italian treat that we love for its simplicity and rich flavor. It combines two of our favorites: a strong shot of espresso and a scoop of smooth vanilla ice cream or gelato.', 'https://cdn.shopify.com/s/files/1/1616/2815/files/Affogato.jpg?v=1710465750', 12, 'coffee', NULL, NULL),
(14, 'Bulletproof Coffee', 'Have you ever heard of Bulletproof Coffee? It\'s a drink that\'s become quite popular, especially among people who follow a ketogenic diet.', 'https://cdn.shopify.com/s/files/1/1616/2815/files/bulletcoffee.jpg?v=1710465788', 16, 'coffee', NULL, NULL),
(15, 'Turkish Coffee', 'In our world of coffee drinks, Turkish coffee holds a special place. It\'s a traditional Middle Eastern beverage that dates back to the 16th century.', 'https://cdn.shopify.com/s/files/1/1616/2815/files/Turkish_Coffee_b18b9ac1-78a9-469c-b12d-6be9612870c7.jpg?v=1710466048', 13, 'coffee', NULL, NULL),
(16, 'Arabica Coffee', 'Arabica beans are the most popular coffee species prized for their mild and aromatic qualities. They\'re often used in our favorite cup of joe and are known for their fruity undertones.', 'https://cdn.shopify.com/s/files/1/1616/2815/files/Arabica_Coffee.jpg?v=1710466096', 11, 'coffee', NULL, NULL),
(17, 'Robusta Coffee', 'We often find Robusta coffee beans right in the heart of our favorite strong and bold brews. These beans are one of the primary coffee species grown globally, next to their cousin Arabica. Now, let’s talk about what makes Robusta stand out.', 'https://cdn.shopify.com/s/files/1/1616/2815/files/Robusta_Coffee.jpg?v=1710466182', 16, 'coffee', NULL, NULL),
(18, 'Caffè Mocha', 'If you love chocolate and coffee, then Caffè Mocha is your go-to coffee drink. We often describe it as a chocolate lover\'s delight because it blends rich espresso with sweet chocolate and creamy milk. It\'s like a warm hug in a cup!', 'https://cdn.shopify.com/s/files/1/1616/2815/files/Caffe_Mocha.jpg?v=1710465968', 16, 'coffee', NULL, NULL),
(19, 'Café au Lait (Milk)', 'We all love starting our day with a warm cup of coffee. One delightful choice that we often recommend is the Café au Lait. This simple and classic drink is a staple in French breakfast tradition. Now, let\'s find out what makes a Café au Lait so special.', 'https://cdn.shopify.com/s/files/1/1616/2815/files/Cafe_au_Lait_Milk.jpg?v=1710466228', 12, 'coffee', NULL, NULL),
(20, 'Doppio', 'When we\'re talking about espresso, doppio is a term you\'ll often hear. It\'s Italian for \"double,\" and it refers to a double shot of espresso. Here\'s what you need to know about this strong and beloved Italian coffee classic.', 'https://cdn.shopify.com/s/files/1/1616/2815/files/Doppio.jpg?v=1710466277', 17, 'coffee', NULL, NULL),
(21, 'Artichoke Tea', 'Artichoke tea is definitely one of the lesser-known tea varieties, but it does not involve the actual vegetable itself.', 'https://images.unsplash.com/photo-1523920290228-4f321a939b4c?q=80&w=2676&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 6, 'tea', NULL, NULL),
(22, 'Green Tea ', 'Green tea stands out as one of the healthiest choices among various types of teas, primarily due to its high concentration of antioxidants. Green tea comes from the Camellia sinensis plant.', 'https://www.health.com/thmb/lQfQo-_Jg76gffLF_ZDU0Htr_S0=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/Tea-GreenTea-f73901fc468d439f9e4624af49fa81c3.jpg', 8, 'tea', NULL, NULL),
(23, 'Black Tea', 'Black tea, distinguished by its rich flavor and dark coloration, is another excellent choice.', 'https://www.health.com/thmb/ech88AKMjTRwSkIR_ClP1lbls5Y=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/Tea-BlackTea-553e28fc2151408c843be9d264220b92.jpg', 12, 'tea', NULL, NULL),
(24, 'Peppermint Tea', ' Peppermint tea is a popular herbal tea made from the leaves of the peppermint plant, known scientifically as Mentha piperita. It\'s not only cherished for its refreshing taste but also for its wide range of health benefits. ', 'https://www.health.com/thmb/axAggeBAeGGTEdZ6KHVq_xyEVM4=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/Tea-Peppermint-cc7adefa7b7f42628d4f44f7a8d5b37c.jpg', 11, 'tea', NULL, NULL),
(25, 'Chamomile Tea', 'Chamomile tea, derived from the dried flowers of the chamomile plant, is a widely consumed herbal tea known for its calming effects. It\'s a healthy choice for several reasons.', 'https://www.health.com/thmb/cSp9MlFd1qPjR2OAQakIPjXTRRM=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/Tea-Chamomile-b4b4036907554731b4549d3c454bc8fc.jpg', 11, 'tea', NULL, NULL),
(26, 'Oolong Tea', 'Oolong tea, a traditional Chinese tea that falls somewhere between green and black tea in oxidation, presents a myriad of health benefits, making it a great choice for tea enthusiasts.', 'https://www.health.com/thmb/GEX_7Aw3bSacRWQDmXLpDcVtOak=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/Tea-Oolong-77943ed99e0d40a792b9a5fa304d4eb9.jpg', 13, 'tea', NULL, NULL),
(27, 'Dandelion Tea ', 'Dandelion tea, derived from the roots and leaves of the dandelion plant, stands out as a healthful beverage choice due to its plethora of benefits.', 'https://www.health.com/thmb/T7PgPTQJZnf_3S7Yi2keKh9tc00=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/Tea-Dandelion-88d64a99a25f47bf922d32f08884ccb2.jpg', 14, 'tea', NULL, NULL),
(28, 'White Tea', ' White tea, named for the fine white fuzz that covers its buds, is a minimally processed tea known for its delicate flavor and aroma.', 'https://www.health.com/thmb/3iz-y7aEWy8qtG96G3PGVs6EH0c=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/Tea-WhiteTea-3e58822b06d64a4291a8e4d0b78305a2.jpg', 11, 'tea', NULL, NULL),
(29, 'Rooibos Tea ', 'Rooibos tea, originating from the South African fynbos region, is a caffeine-free herbal tea made from the leaves of the Aspalathus linearis plant.', 'https://www.health.com/thmb/qzjtqt9xbq0Qi4VYuQyxFEHQhnc=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/Tea-Rooibos-3f94ba86d19244989c2de9e469630611.jpg', 16, 'tea', NULL, NULL),
(30, 'Hibiscus Tea ', 'Hibiscus tea, a refreshing beverage made from the dried petals of the Hibiscus sabdariffa flower, is known for its tangy flavor, and its health benefits.', 'https://www.health.com/thmb/NjbPOZXP3IpWPfgu-yLeDO--1Ak=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/Tea-Hibiscus-62772f27d22d4d2882d1bb75c50b6bb5.jpg', 14, 'tea\r\n', NULL, NULL),
(31, 'Ginger Tea', ' Ginger tea, known for its distinctive spicy flavor and aroma, is a popular herbal beverage made from the root of the ginger plant.', 'https://www.health.com/thmb/IsF2RK78TjOfcFSU8bB_vUbOqr4=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/Tea-GingerTea-a74706c446664f53bb243b75202b46bf.jpg', 15, 'tea', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `product_users`
--

CREATE TABLE `product_users` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_number_unique` (`number`);

--
-- Индексы таблицы `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_products_product_id_foreign` (`product_id`),
  ADD KEY `order_products_order_id_foreign` (`order_id`);

--
-- Индексы таблицы `order_users`
--
ALTER TABLE `order_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_users_user_id_foreign` (`user_id`),
  ADD KEY `order_users_order_id_foreign` (`order_id`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_title_unique` (`title`);

--
-- Индексы таблицы `product_users`
--
ALTER TABLE `product_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_users_product_id_foreign` (`product_id`),
  ADD KEY `product_users_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `order_users`
--
ALTER TABLE `order_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `product_users`
--
ALTER TABLE `product_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order_users`
--
ALTER TABLE `order_users`
  ADD CONSTRAINT `order_users_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product_users`
--
ALTER TABLE `product_users`
  ADD CONSTRAINT `product_users_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
