CREATE TABLE `tbl` (
                         `id` int(11) NOT NULL AUTO_INCREMENT,
                         `email` varchar(150) NOT NULL,
                         `date` timestamp DEFAULT CURRENT_TIMESTAMP,
                         PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;