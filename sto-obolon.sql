-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июн 15 2016 г., 00:05
-- Версия сервера: 5.5.49-0+deb8u1
-- Версия PHP: 5.6.20-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `sto-obolon`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `public` tinyint(1) NOT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `alias`, `body`, `public`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'Пробная статья', 'probnaja-statja', '<p><strong><img alt="" src="/public/uploads/images/images/avtoservis1.jpg" style="float:left; height:220px; margin:4px 8px; width:330px" />Lorem Ipsum</strong> - это текст-&quot;рыба&quot;, часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной &quot;рыбой&quot; для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.</p>\n', 1, 'Пробная статья', 'Описание пробной статьи', 'статья, пробная', NULL, '2016-06-14 18:02:14'),
(2, 'Пробная статья 2', 'probnaja-statja-2', '<p>&nbsp;</p>\n\n<p><img alt="" src="/public/uploads/images/images/avtoservis1.jpg" style="float:right; height:200px; line-height:20.8px; margin:4px 8px; width:300px" /></p>\n\n<p><strong>Lorem Ipsum</strong> - это текст-&quot;рыба&quot;, часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной &quot;рыбой&quot; для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов.</p>\n\n<p>Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.</p>\n', 1, 'Пробная статья', 'Описание пробной статьи', 'статья, пробная', NULL, '2016-06-14 18:03:06'),
(3, 'Пробная статья 3', 'probnaja-statja-3', '<p><strong>Lorem Ipsum</strong> - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.</p>', 1, 'Пробная статья', 'Описание пробной статьи', 'статья, пробная', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `public` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `menus`
--

INSERT INTO `menus` (`id`, `title`, `sort`, `page_id`, `public`, `created_at`, `updated_at`) VALUES
(1, 'Главная', 10, 1, 1, NULL, NULL),
(2, 'Статьи', 30, 2, 1, NULL, NULL),
(3, 'Отзывы', 40, 3, 1, NULL, NULL),
(4, 'Контакты', 50, 4, 1, NULL, NULL),
(5, 'Услуги', 20, 5, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
`id` int(10) unsigned NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `author`, `email`, `phone`, `body`, `created_at`, `updated_at`) VALUES
(1, 'Mykyta', 'mp091689@gmail.com', '+380507095075', 'Hello world! Call me back!', '2016-06-06 14:18:50', '2016-06-06 14:18:50'),
(2, 'Mykyta', 'mp091689@gamil.com', '0507095075', 'asdfasdfad\r\nfasdfasd\r\nfsdf asdf asdf asdfas\r\nd fasd fasdf ', '2016-06-09 23:49:36', '2016-06-09 23:49:36');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_05_11_105954_create_pages_table', 1),
('2016_05_11_110031_create_menus_table', 1),
('2016_05_12_112243_create_articles_table', 1),
('2016_05_16_070523_create_shares_table', 1),
('2016_05_25_071326_create_reviews_table', 1),
('2016_05_27_073656_create_messages_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `public` tinyint(1) NOT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `title`, `alias`, `body`, `public`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'Главная', 'public', '<p><img alt="СТО На Оболони" src="/public/uploads/images/images/avtoservis1.jpg" style="float:right; height:200px; margin:4px 8px; width:300px" />Здравствуй, дорогой Клиент.</p>\n\n<p>Мы рады тому, что Вы посетили наш сайт и надеемся, что он поможет Вам больше узнать о нашем автосервисе.</p>\n\n<p>Мы добились огромных успехов в сфере обслуживания автомобилей, активно внедряем новые технологии, увеличиваем спектр оказываемых услуг.</p>\n\n<p>Наша команда высокопрофессиональных специалистов максимально быстро и качественно решит самые сложные вопросы, связанные с ремонтом и техническим обслуживанием Вашего автомобиля!</p>\n', 1, 'СТО на Оболони', 'Быстрый ремонт автомобиля в СТО на Оболони, город Киев.', 'Киев, СТО, оболонь, станция технического бослуживания', NULL, '2016-06-14 18:01:18'),
(2, 'Статьи', 'articles', '<h1>Статьи</h1><p>Мы постоянно следим за новинками в сфере обслуживания автомоблей и всегда делимся с Вами самыми интересными фактами, технологиями, методами проведения технического обслуживания</p>', 1, 'Новости', 'Статьи и новости о продвинутых технологиях обслуживания автомобилей.', 'Новости, СТО, Киев, Оболонь', NULL, NULL),
(3, 'Отзывы', 'reviews', '<h1>Оставьте ваше сообщение</h1><p>Здесь Вы можете оставить свой отзыв, благодарность, высказать своё мнение, что бы помочь нам повысить качесвто услуг для Вас. Вы можете задать вопрос – мы обязательно дадим Вам ответ.</p><p>Заполните форму и введите контрольный код и Ваше письмо будет отправлено специалистам компании.</p>', 1, 'Отзывы', 'Отзывы и высказывания клиентов СТО на Оболони в городе Киев.', 'отзывы, СТО, оболонь, Киев', NULL, NULL),
(4, 'Контакты', 'contacts', '<h1>Контакты</h1>\n\n<p><strong>Украина, Киев<br />\nул. Полярная, 19,<br />\nгаражный кооператив &quot;Припять&quot;,<br />\nБокс 335<br />\n<br />\nobolon.sto@gmail.com<br />\nТел.: +38 (050) 500-91-11<br />\nТел.: +38 (097) 839-95-54</strong></p>\n', 1, 'Контакты', 'Адрес, контакты СТО на Оболони в городе Киев.', 'контакты, адрес, СТО, оболонь, Киев', NULL, '2016-06-14 14:45:18'),
(5, 'Услуги', 'uslugi', '<h1>Наши услуги</h1>\n\n<p><em><strong>Наше СТО специализируется на установке, настройке, обслуживании газобаллонного оборудования. А также наши специалисты выполняют различные виды работ по обслуживанию и ремонту Вашего автомобиля. Вот лишь некоторые из них:</strong></em></p>\n\n<ul>\n	<li><strong>РЕМОНТ КОРОБКИ ПЕРЕКЛЮЧЕНИЯ ПЕРЕДАЧ</strong></li>\n</ul>\n\n<p>Стоимость работ от 300 грн. Наше СТО проводит диагностику коробки передач, и в сжатые сроки дарит новую жизнь даже, казалось бы, безнадежным вариантам. Предоставляем гарантию на работы.</p>\n\n<ul>\n	<li><strong>ПРОВЕДЕНИЕ ТО ГБО</strong></li>\n</ul>\n\n<p>Включает в себя замену фильтров тонкой и грубой очистки, проверку герметичности системы, протяжка хомутных соединений. Стоимость работ от 70 грн</p>\n\n<ul>\n	<li><strong>ВЫПОЛНЕНИЕ ТО АВТОМОБИЛЯ</strong></li>\n</ul>\n\n<p>Замена фильтра масляного, замена масла, проверка всех уровней жидкости, диагностика подвески автомобиля, проверка тормозной системы, проверка работоспособности щеток стеклоочистителя и ламп наружного освещения. Стоимость работ от 100грн.</p>\n\n<ul>\n	<li><strong>РЕМОНТ ПОДВЕСКИ АВТОМОБИЛЯ</strong></li>\n</ul>\n\n<p>Замена сайлентблоков рычагов, стоек и втулок&nbsp; стабилизатора, амортизаторов, шаровых опор, рулевых тяг, рычагов, ступичных подшипников, ШРУСов, приводных валов.</p>\n\n<ul>\n	<li><strong>РЕМОНТ ТОРМОЗНОЙ СИСТЕМЫ</strong></li>\n</ul>\n\n<p>Проверка, замена тормозных колодок, тормозных дисков. Замена тормозных шлангов.&nbsp;Стоимость работ от 100грн.</p>\n\n<ul>\n	<li><strong>ПРОЧИЕ ВИДЫ РАБОТ</strong></li>\n</ul>\n\n<p>Замена комплекта ремней и роликов ГРМ, помпы. Замена свечей. Замена сцепления. Замена, ремонт коробки переключения передач. Умтановка защиты двигателя, коробки передач, раздаточной коробки передач, дифференциала.</p>\n', 1, 'Услуги', 'Быстрые и качественные услуги по тоехническому обслуживанию автомобилей в СТО на Оболони, город Киев.', 'услуги, ремонт автомобиля, СТО, оболонь, Киев', NULL, '2016-06-14 14:41:08');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('mp091689@gmail.com', '62d3fdaeaacdabd06066c43c90dcafc3c724ea1f4957864c61cf40b4a3523a26', '2016-06-14 17:00:08');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
`id` int(10) unsigned NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `public` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `author`, `email`, `body`, `public`, `created_at`, `updated_at`) VALUES
(1, 'Петров Петр Петрович', 'example@example.com', 'Отзыв благодарного клиента) Описание какая СТО хорошая и пунктуальные рабочие)', 1, '2016-06-06 13:57:03', NULL),
(2, 'Иванов Иван Иванович', 'example@example.com', 'Отзыв благодарного клиента) Описание какая СТО хорошая и пунктуальные рабочие)', 1, '2016-06-06 13:57:03', NULL),
(3, 'Васютки Василий Васильевич', 'example@example.com', 'Отзыв благодарного клиента) Описание какая СТО хорошая и пунктуальные рабочие)', 1, '2016-06-06 13:57:03', NULL),
(4, 'Mykyta', 'mp091689@gmail.com', 'Hello my first review', 1, '2016-06-06 13:58:02', '2016-06-06 13:58:02'),
(5, 'Никита', 'mp091689@gmail.com', 'Пробный отзыв, проверочка', 1, '2016-06-09 23:53:20', '2016-06-09 23:53:20'),
(6, 'Александр', 'mp091689@gmail.com', 'Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила п''ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп''ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.', 1, '2016-06-14 14:11:22', '2016-06-14 14:13:32'),
(7, '', '', '', 0, '2016-06-14 16:47:39', '2016-06-14 16:47:39'),
(8, 'Hello', 'hello@mail.com', 'HelloHelloHelloHelloHelloHelloHello', 0, '2016-06-14 17:06:28', '2016-06-14 17:06:28'),
(9, 'sdfgsdfgs', 'gsdfg@gfdh.dfgh', 'sdfgsdfgsdfgs sdfg sdfg sdfg ', 0, '2016-06-14 17:07:12', '2016-06-14 17:07:12');

-- --------------------------------------------------------

--
-- Структура таблицы `shares`
--

CREATE TABLE IF NOT EXISTS `shares` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `begin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `public` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'mp091689@gmail.com', '$2y$10$HpsxbDwiT6s73WBSun018O8Wr475/rSpFLKiYcqxGEoqG2mFXDb0y', 'hh4TUUrJwQmooATRDigOx7IRD0sF5fAhbcYaenF9dkspUOzWheLUN5czxudN', '2016-06-14 15:27:05', '2016-06-14 16:59:46');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `articles_alias_unique` (`alias`);

--
-- Индексы таблицы `menus`
--
ALTER TABLE `menus`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `menus_sort_unique` (`sort`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `pages_alias_unique` (`alias`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `shares`
--
ALTER TABLE `shares`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `menus`
--
ALTER TABLE `menus`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `shares`
--
ALTER TABLE `shares`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
