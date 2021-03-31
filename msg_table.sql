-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-03-30 19:12:13
-- サーバのバージョン： 10.4.18-MariaDB
-- PHP のバージョン: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `kadai0331_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `msg_table`
--

CREATE TABLE `msg_table` (
  `user_id` int(16) NOT NULL,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(258) COLLATE utf8_unicode_ci NOT NULL,
  `msg` varchar(516) COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `msg_table`
--

INSERT INTO `msg_table` (`user_id`, `username`, `title`, `msg`, `indate`) VALUES
(5, '0', 'テスト', '投稿できた', '2021-03-31 00:47:13'),
(5, '0', 'ここなっつ', 'ここなっつ', '2021-03-31 01:49:17'),
(6, '0', '焼肉たべた', 'おいしいぞ', '2021-03-31 01:59:40'),
(5, '北海道万歳', 'かかお', 'おかか', '2021-03-31 02:02:33'),
(6, 'kondou', '方法論', 'なんのこっちゃ', '2021-03-31 02:06:03'),
(6, 'kondou', '眠い', 'そろそろ寝ないとやばい、、、、', '2021-03-31 02:08:28');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
