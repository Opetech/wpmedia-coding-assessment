DROP TABLE IF EXISTS `admin`;

CREATE TABLE IF NOT EXISTS `admin` (
    `id` int(11) NOT NULL auto_increment,
    `name` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `password` varchar(255) NULL,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);
