-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Дек 20 2022 г., 13:05
-- Версия сервера: 10.3.37-MariaDB
-- Версия PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `talaba_net`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bots`
--

CREATE TABLE IF NOT EXISTS `bots` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `token` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `bots`
--

INSERT INTO `bots` (`id`, `name`, `username`, `token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Talaba.net', '@documentapibot', '1211741935:AAH_Ely_nR71I9IIvtj-mZo62Nf6bpYAbOo', 0, '2022-10-30 23:11:41', '2022-11-03 10:41:12'),
(4, 'Talaba.net', '@talabanet_bot', '5667518944:AAFd7PEIGmkuBDpRFAH5wfOhDk_EsOpfjq0', 1, '2022-10-31 06:15:50', '2022-11-03 10:41:13');

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint(20) unsigned NOT NULL,
  `userid` varchar(255) NOT NULL,
  `step` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `userid`, `step`, `first_name`, `last_name`, `username`, `phone`, `created_at`, `updated_at`) VALUES
(1, '5465089299', 'tarif', 'Boburbek.011', 'Davronov.', 'bds_support', '998337829599', '2022-10-29 12:34:39', '2022-11-10 10:00:29'),
(3, '1256474539', 'tarif', 'ㅤ', NULL, 'Sherra_95', '998998095756', '2022-10-29 12:55:49', '2022-10-29 12:56:14'),
(4, '649225915', 'tarif', 'Азизбек', 'Шарипов', 'sharipov_azizbek', '998997070780', '2022-10-29 20:05:40', '2022-10-29 20:05:44'),
(5, '56166391', 'tarif', 'AZIZBEK', NULL, 'AzizbekSharipovv', '998906133929', '2022-11-03 06:48:36', '2022-11-03 06:48:42'),
(6, '909945209', 'tarif', 'Ahrorbek', 'Davronov', 'ahrorbekdf', '+998999152409', '2022-11-05 03:53:14', '2022-11-05 03:53:16'),
(7, '515620106', 'phone', 'Abubakir', 'Sharipov', NULL, '', '2022-11-05 19:22:36', '2022-11-05 19:22:36'),
(8, '460846532', 'tarif', 'Абидов', 'Фируз', 'myers_88', '+998997081915', '2022-11-28 09:08:38', '2022-11-28 09:08:42'),
(9, '281375139', 'tarif', 'Шоҳруҳ', 'Исроилов', 'ShOxXx93', '998997060906', '2022-12-17 11:17:12', '2022-12-17 11:17:25'),
(10, '5107597471', 'phone', 'Tursunova', NULL, NULL, '', '2022-12-18 14:01:38', '2022-12-18 14:01:38'),
(11, '529295031', 'phone', 'Mavluda Jalilova', NULL, NULL, '', '2022-12-18 14:04:04', '2022-12-18 14:04:04'),
(12, '1341474875', 'tarif', 'SUNNAT', 'Sanoqulov', NULL, '998991614846', '2022-12-18 14:07:30', '2022-12-18 14:08:04'),
(13, '1621437663', 'phone', 'Ozod', 'karimov', NULL, '', '2022-12-18 14:10:21', '2022-12-18 14:10:21'),
(14, '2026637362', 'phone', 'Diyorbek_Arabov_', NULL, NULL, '', '2022-12-18 14:15:25', '2022-12-18 14:15:25'),
(15, '1199866136', 'tarif', 'Бек', NULL, NULL, '998997630322', '2022-12-18 14:24:34', '2022-12-18 14:25:17'),
(16, '1298730129', 'phone', 'Qorayev B', NULL, NULL, '', '2022-12-18 14:27:56', '2022-12-18 14:27:56');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_16_052816_create_orders_table', 1),
(6, '2022_10_28_084930_create_rates_table', 2),
(7, '2022_10_28_104411_create_clients_table', 3),
(8, '2022_10_28_111042_create_payments_table', 4),
(9, '2022_10_28_111830_create_payment_providers_table', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `public` varchar(255) DEFAULT NULL,
  `secret_key` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint(20) unsigned NOT NULL,
  `userid` varchar(255) NOT NULL,
  `rate_id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `invoice_payload` varchar(255) NOT NULL,
  `order_info` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`order_info`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=903 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `payments`
--

INSERT INTO `payments` (`id`, `userid`, `rate_id`, `provider_id`, `currency`, `total_amount`, `invoice_payload`, `order_info`, `created_at`, `updated_at`) VALUES
(1, '649225915', 5, 2, 'UZS', '500000', '2:5', '{"currency":"UZS","total_amount":500000,"invoice_payload":"2:5","order_info":{"phone_number":"998997070780"},"telegram_payment_charge_id":"1211741935_649225915_289765_7161097787395031040","provider_payment_charge_id":"636154dec5298a31df7a6f32"}', '2022-11-01 22:22:25', '2022-11-01 22:22:25'),
(2, '649225915', 5, 2, 'UZS', '500000', '2:5', '{"currency":"UZS","total_amount":500000,"invoice_payload":"2:5","order_info":{"phone_number":"998997070780"},"telegram_payment_charge_id":"1211741935_649225915_289848_7161255819034520576","provider_payment_charge_id":"6361e43fe79cb87fd2aadf27"}', '2022-11-01 22:30:08', '2022-11-01 22:30:08'),
(3, '649225915', 1, 2, 'UZS', '500000', '2:1', '{"currency":"UZS","total_amount":500000,"invoice_payload":"2:1","order_info":{"phone_number":"998997070780"},"telegram_payment_charge_id":"5667518944_649225915_291061_7162898658246969344","provider_payment_charge_id":"6367ba7287aa22c6f3fb93c1"}', '2022-11-06 13:45:22', '2022-11-06 13:45:22'),
(899, '649225915', 1, 2, 'UZS', '500000', '2:1', '{"currency":"UZS","total_amount":500000,"invoice_payload":"2:1","order_info":{"phone_number":"998997070780"},"telegram_payment_charge_id":"5667518944_649225915_291848_7163609621942354944","provider_payment_charge_id":"636a410a549c8705080f71ad"}', '2022-11-08 11:44:11', '2022-11-08 11:44:11'),
(900, '649225915', 1, 2, 'UZS', '500000', '2:1', '{"currency":"UZS","total_amount":500000,"invoice_payload":"2:1","order_info":{"phone_number":"998997070780"},"telegram_payment_charge_id":"5667518944_649225915_295207_7168937841580436480","provider_payment_charge_id":"637d2f0a7e7c64c866ae73bf"}', '2022-11-22 20:20:27', '2022-11-22 20:20:27'),
(901, '649225915', 5, 2, 'UZS', '1000000', '2:5', '{"currency":"UZS","total_amount":1000000,"invoice_payload":"2:5","order_info":{"phone_number":"998997070780"},"telegram_payment_charge_id":"5667518944_649225915_301650_7177989299313646592","provider_payment_charge_id":"639d575022c4eb69cdf39a1a"}', '2022-12-17 05:44:48', '2022-12-17 05:44:48'),
(902, '281375139', 1, 2, 'UZS', '500000', '2:1', '{"currency":"UZS","total_amount":500000,"invoice_payload":"2:1","order_info":{"phone_number":"998914478798"},"telegram_payment_charge_id":"5667518944_281375139_131426_7178075162840463360","provider_payment_charge_id":"639da5a30a469870cdfd3851"}', '2022-12-17 11:19:00', '2022-12-17 11:19:00');

-- --------------------------------------------------------

--
-- Структура таблицы `payment_providers`
--

CREATE TABLE IF NOT EXISTS `payment_providers` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `payment_providers`
--

INSERT INTO `payment_providers` (`id`, `name`, `token`, `created_at`, `updated_at`) VALUES
(1, 'Click', '387026696:LIVE:635a5da84ac77fd51372b7c4:Payme', '2022-10-28 19:00:00', '2022-11-03 10:40:54'),
(2, 'Payme', '387026696:LIVE:6363907374a123d7071ee48e', '2022-10-28 19:00:00', '2022-11-03 10:41:05');

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `rates`
--

CREATE TABLE IF NOT EXISTS `rates` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `button_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `rates`
--

INSERT INTO `rates` (`id`, `name`, `button_name`, `description`, `price`, `created_at`, `updated_at`) VALUES
(5, 'VIP 1 oy tarifi bo''yicha to''lov', 'VIP_1_oy', '1 oyda 10 000 so''m', 10000, '2022-10-30 06:34:31', '2022-12-17 16:47:10');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ahrorbek Davronov', 'axrorbekdf@gmail.com', NULL, '$2y$10$hed4rc5pNyxAO0GAT7MC7O2Oo6nmKia2yTNienP70Lne62BGfC.AO', 'pyOzoFPLbG30ro1w4k6QZiLTo63mU72I8oasbC6xBmdw4LDYhv1r4hj5mTZr', '2022-10-28 00:29:16', '2022-10-31 04:58:24');

-- --------------------------------------------------------

--
-- Структура таблицы `vuachers`
--

CREATE TABLE IF NOT EXISTS `vuachers` (
  `id` int(11) NOT NULL,
  `userid` bigint(11) DEFAULT NULL,
  `rate_id` int(11) NOT NULL,
  `payment_id` bigint(11) DEFAULT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT 'bot',
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `vuachers`
--

INSERT INTO `vuachers` (`id`, `userid`, `rate_id`, `payment_id`, `login`, `password`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 649225915, 1, 899, '12345678', '1234', 'bot', 1, '2022-11-08 11:40:35', '2022-11-08 11:44:11'),
(5, 281375139, 1, 902, '50772666', '1602', 'bot', 1, '2022-11-11 12:29:13', '2022-12-17 11:19:00'),
(6, 649225915, 1, 900, '88260482', '8134', 'bot', 1, '2022-11-11 12:29:30', '2022-11-22 20:20:27'),
(9, 649225915, 5, 901, '31374885', '7492', 'bot', 1, '2022-11-11 12:30:51', '2022-12-17 05:44:48'),
(17, NULL, 5, NULL, '4578@buk', '2343', 'rate', 0, '2022-12-18 04:50:39', '2022-12-18 04:50:39'),
(18, NULL, 5, NULL, '8697@buk', '8839', 'rate', 0, '2022-12-20 06:18:14', '2022-12-20 06:18:14');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bots`
--
ALTER TABLE `bots`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `payment_providers`
--
ALTER TABLE `payment_providers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `vuachers`
--
ALTER TABLE `vuachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bots`
--
ALTER TABLE `bots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=903;
--
-- AUTO_INCREMENT для таблицы `payment_providers`
--
ALTER TABLE `payment_providers`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `rates`
--
ALTER TABLE `rates`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `vuachers`
--
ALTER TABLE `vuachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
