-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-03-28 03:55:32
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
-- テーブルの構造 `register_func`
--

CREATE TABLE `register_func` (
  `user_id` int(5) NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `sex` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(3) NOT NULL,
  `profile` varchar(1028) COLLATE utf8_unicode_ci NOT NULL,
  `other` varchar(516) COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `register_func`
--

INSERT INTO `register_func` (`user_id`, `username`, `email`, `password`, `sex`, `age`, `profile`, `other`, `indate`) VALUES
(1, 'ここの', 'aaa@ggg.com', '12345', '男', 29, 'あああああああああああああああああああ\r\n', 'いいいいいいいいいいいい', '2021-03-27 18:24:33'),
(2, 'takaoka', 'tktk9977@gmail.com', 'tt001188', '男', 50, 'ええええええええええ', 'ううううううううううう', '2021-03-28 09:48:51');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `register_func`
--
ALTER TABLE `register_func`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `register_func`
--
ALTER TABLE `register_func`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
