DROP TABLE IF EXISTS `internal_links`;

CREATE TABLE IF NOT EXISTS `internal_links` (
    `id` int(11) NOT NULL auto_increment,
    `source_url` varchar(500) NOT NULL,
    `target_url` varchar(500) NOT NULL,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);
