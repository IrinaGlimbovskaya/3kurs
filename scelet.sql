-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 11 2024 г., 08:21
-- Версия сервера: 8.0.30
-- Версия PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `scelet`
--

-- --------------------------------------------------------

--
-- Структура таблицы `exams`
--

CREATE TABLE `exams` (
  `id` int NOT NULL,
  `DayOfWeek` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Date` date NOT NULL,
  `Subject` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Teacher` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Classroom` int NOT NULL,
  `LessonNumber` int NOT NULL,
  `EventType` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `exams`
--

INSERT INTO `exams` (`id`, `DayOfWeek`, `Date`, `Subject`, `Teacher`, `Classroom`, `LessonNumber`, `EventType`) VALUES
(1, 'Четверг', '2024-01-04', 'Организация проектной деятельности', 'доцент Тягульская Л.&nbspА.', 23, 2, 'Зачёт с оценкой'),
(2, 'Пятница', '2024-01-05', 'Периферийные устройства ЭВМ', 'ст. преп. Глазов А.&nbspБ.', 30, 2, 'Зачёт с оценкой'),
(3, 'Понедельник', '2024-01-08', 'Операционные системы', 'доцент Козак Л.&nbspЯ.', 29, 4, 'Экзамен'),
(4, 'Вторник', '2024-01-09', 'Элективные курсы по физической культуре', ' ст. преп. Борисюк В.&nbspН.', 28, 4, 'Зачёт'),
(5, 'Среда', '2024-01-10', 'Теория формальны языков', ' ст. преп. Гарбузняк Е.&nbspС.', 30, 2, 'Зачёт'),
(6, 'Суббота', '2024-01-06', 'Экономико-математические методы программной инженерии', 'доцент Тягульская Л.&nbspА.', 30, 2, 'Зачет с оценкой'),
(7, 'Понедельник', '2024-01-15', 'Компьютерные сети', 'ст. преп. Глазов А.&nbspБ.', 30, 2, 'Экзамен'),
(8, 'Пятница', '2024-01-19', 'Физическая культура', 'ст. преп. Борисюк В.&nbspН.', 29, 2, 'Зачет'),
(9, 'Вторник', '2024-01-23', 'Базы данных', 'ст. преп. Ляху А.&nbspА.', 29, 2, 'Экзамен');

-- --------------------------------------------------------

--
-- Структура таблицы `schedule`
--

CREATE TABLE `schedule` (
  `id` int NOT NULL,
  `DayName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `number` int NOT NULL,
  `Subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prepod` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Classroom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `GroupNumber` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `schedule`
--

INSERT INTO `schedule` (`id`, `DayName`, `number`, `Subject`, `prepod`, `Classroom`, `GroupNumber`) VALUES
(1, 'Понедельник', 1, 'Компьютерные сети (лекция)', 'Глазов А.&nbspБ.', '30', 'Все'),
(2, 'Понедельник', 2, 'Базы данных', 'Ляху А.&nbspА.', '30', 'Все'),
(3, 'Понедельник', 3, 'Базы данных (практика)', 'Ляху А.&nbspА.', '30', 'Все'),
(4, 'Понедельник', 4, 'Операционные системы (лаб.)', 'Козак Л.&nbspЯ.', '29', 'Все'),
(5, 'Вторник', 1, 'Экономико-математ. методы прогр. инженер. (лекция) <span style=\"color: #ffd800;\">&#9733;</span> /  <br>Организация проектной деятельности <span style=\"color: #009900;\">&#9733;</span>', 'Тягульская Л.&nbspА.', '30', 'Все'),
(6, 'Вторник', 2, 'Организация проектной деятельности', 'Тягульская Л.&nbspА.', '30', '1'),
(7, 'Вторник', 3, 'Теория формальных языков', 'Гарбузняк Е.&nbspС.', '23', 'Все'),
(8, 'Вторник', 4, 'Физическая культура', 'Борисюк В.&nbspН.', 'с/з', 'Все'),
(9, 'Среда', 1, 'Операционные системы', 'Козак Л.&nbspЯ.', '29', 'Все'),
(10, 'Среда', 2, 'Компьютерные сети', 'Глазов А.&nbspБ.', '30', 'Все'),
(11, 'Среда', 3, 'Экономико-математ. методы прогр. инженерии', 'Гарбузняк Е.&nbspС.', '28', 'Все'),
(12, 'Среда', 4, 'Теория формальных языков <span style=\"color: #009900;\">&#9733;</span>', 'Гарбузняк Е.&nbspС.', '23', 'Все'),
(13, 'Четверг', 1, 'Элективные курсы по физической культуре', 'Борисюк В.&nbspН.', 'с/з', 'Все'),
(14, 'Четверг', 2, 'Операционные системы', 'Козак Л.&nbspЯ.', '28', 'Все'),
(15, 'Четверг', 3, 'Периферийные устройства ЭВМ (лекция)', 'Глазов А.&nbspБ.', '30', 'Все'),
(16, 'Четверг', 4, 'Экономико-математ. методы прогр. инженерии', 'Гарбузняк Е.&nbspС.', '30', 'Все'),
(17, 'Пятница', 1, 'Периферийные устройства ЭВМ / Организ. проект. деят.', 'Глазов А.&nbspБ. / Тягульская Л.&nbspА.', '30 <br> 26', '1 / 2'),
(18, 'Пятница', 2, 'Компьютерные сети', 'Глазов А.&nbspБ.', '30', 'Все'),
(19, 'Пятница', 3, 'Периферийные устройства ЭВМ', 'Глазов А.&nbspБ.', '30', '2');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `site` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `photo`, `site`) VALUES
(1, 'Дарья', 'Озтинен', 'images/dasha.jpg', 'Dasha/index.html'),
(2, 'Илья', 'Глинка', 'images/Glinka.jpg', 'Glinka/main_page.html'),
(3, 'Дмитрий ', 'Кочубей', 'images/kochubei.jpg', 'Kochubei/main1.html'),
(4, 'Дима', 'Строжевский', 'images/Strojevskiy.jpg', 'Strojevskiy/index.html'),
(5, 'Александра', 'Нихолат', 'images/niholat.jpg', 'Niholat/portfolio.html'),
(6, 'Геннадий', 'Марко', 'images/genna.jpg', 'Marko/index.html'),
(7, 'Александр', 'Лазарев', 'images/lasarev.jpg', ''),
(8, 'Вадим', 'Лаптуров', 'images/lapturov.jpg', 'Lapturov/index.html'),
(9, 'Андрей', 'Корня', 'images/andrei1.jpg', ''),
(10, 'Никита', 'Тодика', 'images/nikita.jpg', ''),
(11, 'Владислав', 'Николай', 'images/nikolai.jpg', ''),
(12, 'Владислав', 'Фуника', 'images/slavik.jpg', ''),
(13, 'Виктория', 'Осипова', 'images/vika.jpg', ''),
(14, 'Влад', 'Перевязка', 'images/Perevyzka.jpg', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
