--database: 9finder

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `account` (
  `token_id` char(24) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(48) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `account` (`token_id`, `username`, `password`, `level`) VALUES
('58138e0005445', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 0),
('58138e0005449', 'thanhhieu', 'e10adc3949ba59abbe56e057f20f883e', 1);

CREATE TABLE `account_level` (
  `level` int(1) NOT NULL,
  `describe` varchar(24) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `account_level` (`level`, `describe`) VALUES
(0, 'admin'),
(1, 'user');

ALTER TABLE `account`
  ADD PRIMARY KEY (`token_id`),
  ADD KEY `account-level` (`level`);

ALTER TABLE `account_level`
  ADD PRIMARY KEY (`level`);
