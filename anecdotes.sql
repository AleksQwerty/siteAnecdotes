-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Апр 22 2021 г., 18:16
-- Версия сервера: 5.7.26
-- Версия PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `anecdotes`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `login` varchar(30) NOT NULL,
  `password` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`login`, `password`) VALUES
('Aleks', '$2y$10$LExGi9TzBkKnzG/TST.sEOOkrL.tjpsRXBpI5xp7L0ojTCS9RrYvu');

-- --------------------------------------------------------

--
-- Структура таблицы `anecdot`
--

CREATE TABLE `anecdot` (
  `id` int(11) NOT NULL,
  `user_name` varchar(128) DEFAULT NULL,
  `title` varchar(132) DEFAULT NULL,
  `text` text,
  `category` varchar(128) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `is_approved` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `anecdot`
--

INSERT INTO `anecdot` (`id`, `user_name`, `title`, `text`, `category`, `date`, `is_approved`) VALUES
(1, 'иван', 'Магазин', 'Подошел к палатке и попросил в электричку две банки пива. Продавщица дает три.\r\nНемного удивился, поднял глаза, рассмотрел её усталое лицо и произнес:\r\n- Я же просил две.\r\n- Вы же до Москвы, - сказала продавщица, внимательно оглядев с ног до головы мой московский прикид.\r\n- До Москвы, - ответил я.\r\n- Тогда три, - упорствовала продавщица, но я настоял на двух.\r\nИ вот сейчас, немного грустный и потерянный, проезжая станцию Вялки, я понимаю, что продавщица была права.', 'Women', '2020-12-14 17:27:27', 1),
(8, 'Самоделкин', 'Флешка ', 'Сегодня в офисе юзерша (девушка-блондинка) запихнула карту памяти miniSD из мобилки в слот Меmоrу Stiсk Duо РRО в ноутбуке. Естественно, карта ушла туда с головой, админ пыхтит, злится, пытается достать. Админ:\\r\\n- Зачем было ЭТО туда пихать?\\r\\nЮзерша:\\r\\n- По размеру подходило...\\r\\nАдмин:\\r\\n-М-да... Подозреваю, что именно так был изобретен aнальный ceкс...', 'Women', '2020-12-14 17:42:13', 1),
(9, 'Федя', 'Наполеон', 'В 1807 году к Наполеону явился механик Фултон, который предложил императору вооружить флот Франции кораблями, приводимыми в движение паром.– С боевыми кораблями, движимыми паром, вы уничтожите Англию! – закончил свой доклад Фултон.\r\nПрослушав изобретателя, Наполеон сказал:– Каждый день мне приносят проекты один вздорнее другого. Вчера только мне предложили атаковать английское побережье с помощью кавалерии, посаженной на ручных дельфинов. Подите прочь! Вы, очевидно, один из этих бесчисленных сумасшедших!\r\nЧерез восемь лет английский линейный корабль «Беллерофон», отвозивший свергнутого императора на остров Св. Елены, встретился в море с пароходом «Фултон» – американским судном, приводимым в движение паром.\r\nНа большой скорости промчалось оно мимо английского корабля.\r\nПроводив глазами американский пароход, Наполеон молвил Бертрану, своему спутнику:\r\n– Прогнав из Тюильри Фултона, я потерял свою корону!', 'Politics', '2020-12-14 21:08:02', 1),
(10, 'Фома', 'Маршрутка', 'Еду в маршрутке, уставшая, с учёбы. Сижу в салоне спиной к водителю, лицом ко всем остальным пассажирам. Просят меня передать за проезд, беру эти 15 рублей (монетами 10 и 5) и протягиваю руку к водителю (на передних сиденьях два мужика), сама не поворачиваюсь. Чувствую его руку, кожа такая странная, жёсткая... Положила мелочь на его эту \"руку\". Через секунд пять водитель: \"Девушка, вы чего мужчине на лысину положили деньги?..\".', 'Men', '2020-12-15 15:30:02', 0),
(11, 'Арчи', 'Кот', 'Мой кот любит сидеть у меня на плече. Бывает, прихожу с работы, жду, пока он запрыгнет, наливаю себе стакан рома, ругаюсь матом и представляю, что я пират. А то жизнь секретарши иногда скучновата :(', 'Men', '2020-12-15 17:40:04', 1),
(12, 'Winsent', 'Новости', 'Я тут послушал Путина. Цены растут, муку вывозят, народу не хватает денег на еду.\r\nПри Трампе, конечно, тоже жизнь не сахар была, но этот Байден вообще бандит.\r\nЕщё в должность не вступил, а что вытворяет!', 'Sport', '2020-12-15 17:41:00', 1),
(14, 'Фрося', 'Познер', 'Познер - не глупый малый,\r\nно, в целом, большой говнюк.\r\nтупую даёт рекламу\r\nот головы,пиздюк.\r\nЛекарство не помогает,-\r\nРазмолотая трава.\r\nЛишь денежки вылетают\r\nиз кошельков навсегда.\r\nТоварищ, скажу тебе прямо:\r\nты на рекламы плюнь.\r\nПривычные наши сто граммов\r\nлучше заморских пилюль.', 'Sport', '2020-12-16 20:27:11', 1),
(15, 'gbfg,', 'bg', '', 'Women', '2020-12-19 18:31:50', 0),
(16, 'пл', 'привт', 'ркедроа', 'Sport', '2020-12-19 18:32:06', 0),
(17, 'dhfc', 'рав', 'роаеп', 'Politics', '2020-12-20 01:19:50', 0),
(18, 'ges', 'gs', 'ger', 'Politics', '2020-12-20 01:23:17', 0),
(19, 'Владислав', 'Hello', 'vsnvdfk;bn;df;b;fm;', 'Men', '2021-04-22 11:37:44', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `admin_login_uindex` (`login`);

--
-- Индексы таблицы `anecdot`
--
ALTER TABLE `anecdot`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `anecdot`
--
ALTER TABLE `anecdot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
