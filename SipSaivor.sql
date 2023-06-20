-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 06 2023 г., 18:45
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `SipSaivor`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Cart`
--

CREATE TABLE `Cart` (
  `cart_id` int NOT NULL,
  `customed_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Cart`
--

INSERT INTO `Cart` (`cart_id`, `customed_id`, `quantity`, `price`) VALUES
(1, 1, 2, '10.00'),
(2, 1, 1, '15.50'),
(3, 2, 3, '20.25');

-- --------------------------------------------------------

--
-- Структура таблицы `CartItems`
--

CREATE TABLE `CartItems` (
  `cart_id` int NOT NULL,
  `product_id` int NOT NULL,
  `customer_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `CartItems`
--

INSERT INTO `CartItems` (`cart_id`, `product_id`, `customer_id`, `quantity`, `price`) VALUES
(1, 1, 4, 2, NULL),
(1, 2, 4, 1, NULL),
(1, 3, 4, 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `Categories`
--

CREATE TABLE `Categories` (
  `category_id` int NOT NULL,
  `category_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Categories`
--

INSERT INTO `Categories` (`category_id`, `category_name`) VALUES
(1, 'Tea'),
(2, 'Coffee'),
(3, 'Other');

-- --------------------------------------------------------

--
-- Структура таблицы `Countries`
--

CREATE TABLE `Countries` (
  `country_id` int NOT NULL,
  `country_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Countries`
--

INSERT INTO `Countries` (`country_id`, `country_name`) VALUES
(1, 'Brazil'),
(2, 'India'),
(3, 'Kenya'),
(4, 'Sri Lanka'),
(5, 'Kenya'),
(6, 'Japan');

-- --------------------------------------------------------

--
-- Структура таблицы `Customers`
--

CREATE TABLE `Customers` (
  `id` int NOT NULL,
  `username` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `auth_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Customers`
--

INSERT INTO `Customers` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `phone`, `address`, `auth_key`) VALUES
(1, 'alex31', 'john.doe@example.com', '50732d22f44ee17b762d87cce2f9f25743062967', 'John', 'Doe', '1234567890', '123 Main St', ''),
(2, 'kirigiri', 'jane.smith@example.com', '443fd8eb48b0454bc3a3ca5af8df7d7eb00dd4cf', 'Jane', 'Smith', '9876543210', '456 Elm St', ''),
(3, 'bernando', 'michael.johnson@example.com', '7792cdef4f6e61c033cd7818edaec1f011ebd239', 'Michael', 'Johnson', '5555555555', '789 Oak Ave', ''),
(4, 'Shireee', 'kirog11az@gmail.com', '123', 'Vladimir', 'Bagdeev', '+79185164098', 'Ave 75 395', ''),
(35, '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `Flavors`
--

CREATE TABLE `Flavors` (
  `flavor_id` int NOT NULL,
  `flavor_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Flavors`
--

INSERT INTO `Flavors` (`flavor_id`, `flavor_name`) VALUES
(1, 'Мята'),
(2, 'Специи'),
(3, 'Ваниль'),
(4, 'Малина'),
(5, 'Груша'),
(6, 'Цитрус'),
(7, 'Травяной');

-- --------------------------------------------------------

--
-- Структура таблицы `Orders`
--

CREATE TABLE `Orders` (
  `order_id` int NOT NULL,
  `order_date` date DEFAULT NULL,
  `customer_id` int DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Orders`
--

INSERT INTO `Orders` (`order_id`, `order_date`, `customer_id`, `price`) VALUES
(1, '2023-05-01', 1, '100.00'),
(2, '2023-05-02', 2, '75.50'),
(3, '2023-05-03', 3, '200.25'),
(24, '2023-05-28', 4, '6.99'),
(25, '2023-05-28', 3, '22.97'),
(26, '2023-05-31', 4, '6.99'),
(27, '2023-06-06', 4, '31.96'),
(28, '2023-06-06', 4, '6.99');

-- --------------------------------------------------------

--
-- Структура таблицы `Payments`
--

CREATE TABLE `Payments` (
  `payment_id` int NOT NULL,
  `order_id` int DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_amount` decimal(10,2) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Payments`
--

INSERT INTO `Payments` (`payment_id`, `order_id`, `payment_date`, `payment_amount`, `payment_method`) VALUES
(1, 1, '2023-05-05', '50.00', 'Credit Card'),
(2, 2, '2023-05-06', '75.50', 'PayPal'),
(3, 3, '2023-05-07', '200.25', 'Cash'),
(24, 24, '2023-05-28', '6.99', 'PayPal'),
(25, 25, '2023-05-28', '22.97', 'SberPay'),
(26, 26, '2023-05-31', '6.99', 'SberPay'),
(27, 27, '2023-06-06', '31.96', 'Alpha'),
(28, 28, '2023-06-06', '6.99', 'PayPal');

-- --------------------------------------------------------

--
-- Структура таблицы `Products`
--

CREATE TABLE `Products` (
  `product_id` int NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `description` text,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `country_of_origin` int DEFAULT NULL,
  `category_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Products`
--

INSERT INTO `Products` (`product_id`, `product_name`, `description`, `price`, `quantity`, `country_of_origin`, `category_id`) VALUES
(1, 'Earl Grey Tea', 'Классический черный чай с нотками бергамота.', '6.99', 25, 1, 1),
(2, 'Decaf Coffee', 'Насыщенный и полнотелый декофеинизированный кофе.', '8.99', 5, 3, 2),
(3, 'Oolong Tea', 'Полуокисленный чай с уникальным вкусовым профилем.', '7.99', 10, 4, 1),
(41, 'Ceylon ruhuna', 'Вкус, который полностью раскрывается при заваривании.', '8.11', 22, 2, 1),
(42, 'India assam diju', 'Классический индийский черный чай из штата Ассам.', '3.22', 221, 2, 1),
(43, 'Sencha', 'Чай с древесным ароматом и терпким вкусом.\r\n\r\n', '6.22', 81, 6, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `Products_Flavors`
--

CREATE TABLE `Products_Flavors` (
  `product_id` int NOT NULL,
  `flavor_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Products_Flavors`
--

INSERT INTO `Products_Flavors` (`product_id`, `flavor_id`) VALUES
(1, 1),
(3, 1),
(1, 2),
(2, 2),
(2, 3),
(3, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `Reviews`
--

CREATE TABLE `Reviews` (
  `review_id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `customer_id` int DEFAULT NULL,
  `rating` int DEFAULT NULL,
  `comment` text,
  `review_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Reviews`
--

INSERT INTO `Reviews` (`review_id`, `product_id`, `customer_id`, `rating`, `comment`, `review_date`) VALUES
(1, 1, 1, 5, 'Great product!', '2023-05-10'),
(2, 2, 2, 4, 'Good quality.', '2023-05-11'),
(3, 3, 3, 3, 'Average product.', '2023-05-12'),
(16, 3, NULL, 1, '1', '2023-05-31');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Cart`
--
ALTER TABLE `Cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `order_id` (`customed_id`);

--
-- Индексы таблицы `CartItems`
--
ALTER TABLE `CartItems`
  ADD PRIMARY KEY (`cart_id`,`product_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `fk_cartitems_customer` (`customer_id`);

--
-- Индексы таблицы `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Индексы таблицы `Countries`
--
ALTER TABLE `Countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Индексы таблицы `Customers`
--
ALTER TABLE `Customers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Flavors`
--
ALTER TABLE `Flavors`
  ADD PRIMARY KEY (`flavor_id`);

--
-- Индексы таблицы `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Индексы таблицы `Payments`
--
ALTER TABLE `Payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Индексы таблицы `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `country_of_origin` (`country_of_origin`),
  ADD KEY `fk_products_category` (`category_id`);

--
-- Индексы таблицы `Products_Flavors`
--
ALTER TABLE `Products_Flavors`
  ADD PRIMARY KEY (`product_id`,`flavor_id`),
  ADD KEY `flavor_id` (`flavor_id`);

--
-- Индексы таблицы `Reviews`
--
ALTER TABLE `Reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Cart`
--
ALTER TABLE `Cart`
  MODIFY `cart_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `Categories`
--
ALTER TABLE `Categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `Countries`
--
ALTER TABLE `Countries`
  MODIFY `country_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `Customers`
--
ALTER TABLE `Customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `Flavors`
--
ALTER TABLE `Flavors`
  MODIFY `flavor_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `Orders`
--
ALTER TABLE `Orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `Payments`
--
ALTER TABLE `Payments`
  MODIFY `payment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `Products`
--
ALTER TABLE `Products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT для таблицы `Reviews`
--
ALTER TABLE `Reviews`
  MODIFY `review_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `CartItems`
--
ALTER TABLE `CartItems`
  ADD CONSTRAINT `fk_cartitems_cart` FOREIGN KEY (`cart_id`) REFERENCES `Cart` (`cart_id`),
  ADD CONSTRAINT `fk_cartitems_customer` FOREIGN KEY (`customer_id`) REFERENCES `Customers` (`id`),
  ADD CONSTRAINT `fk_cartitems_product` FOREIGN KEY (`product_id`) REFERENCES `Products` (`product_id`);

--
-- Ограничения внешнего ключа таблицы `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `Customers` (`id`);

--
-- Ограничения внешнего ключа таблицы `Payments`
--
ALTER TABLE `Payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `Orders` (`order_id`);

--
-- Ограничения внешнего ключа таблицы `Products`
--
ALTER TABLE `Products`
  ADD CONSTRAINT `fk_products_category` FOREIGN KEY (`category_id`) REFERENCES `Categories` (`category_id`),
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`country_of_origin`) REFERENCES `Countries` (`country_id`);

--
-- Ограничения внешнего ключа таблицы `Products_Flavors`
--
ALTER TABLE `Products_Flavors`
  ADD CONSTRAINT `products_flavors_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `Products` (`product_id`),
  ADD CONSTRAINT `products_flavors_ibfk_2` FOREIGN KEY (`flavor_id`) REFERENCES `Flavors` (`flavor_id`);

--
-- Ограничения внешнего ключа таблицы `Reviews`
--
ALTER TABLE `Reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `Products` (`product_id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `Customers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
