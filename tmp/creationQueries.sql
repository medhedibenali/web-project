-- work in progress
-- web_project_db
CREATE DATABASE `web_project_db`;
-- web_project_user
CREATE USER 'web_project_user' @'localhost' IDENTIFIED BY 'password';
GRANT INSERT,
    SELECT,
    UPDATE,
    DELETE ON `web_project_db`.* TO `web_project_user` @`localhost`;
-- users
CREATE TABLE `web_project_db`.`users` (
    `username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `first_name` VARCHAR(255) NOT NULL,
    `last_name` VARCHAR(255) NOT NULL,
    `birthday` DATE NOT NULL,
    `bio` TEXT,
    `join_date` DATE DEFAULT (CURRENT_DATE),
    `location` VARCHAR(255),
    `image` VARCHAR(255) NOT NULL,
    `image_seed` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`username`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- authors
CREATE TABLE `web_project_db`.`authors` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `pen_name` VARCHAR(255) NOT NULL,
    `first_name` VARCHAR(255) NOT NULL,
    `last_name` VARCHAR(255) NOT NULL,
    `birthday` DATE NOT NULL,
    `deathday` DATE DEFAULT NULL,
    `bio` TEXT NOT NULL,
    `nationality` VARCHAR(255) NOT NULL,
    `image` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- books
CREATE TABLE `web_project_db`.`books` (
    `isbn` VARCHAR(255) NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `author` INT NOT NULL,
    `pages` INT NOT NULL,
    `publisher` VARCHAR(255) NOT NULL,
    `image` VARCHAR(255) NOT NULL,
    `synopsis` TEXT NOT NULL,
    `publishing_year` YEAR NOT NULL,
    `rating` FLOAT,
    `genre` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`isbn`),
    FOREIGN KEY (`author`) REFERENCES `authors` (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- read_act
CREATE TABLE `web_project_db`.`read_act` (
    `isbn` VARCHAR(255) NOT NULL,
    `username` VARCHAR(255) NOT NULL,
    `status` VARCHAR(255) NOT NULL,
    `start_date` DATETIME,
    `finish_date` DATETIME,
    PRIMARY KEY (`isbn`, `username`),
    FOREIGN KEY (`isbn`) REFERENCES `books` (`isbn`),
    FOREIGN KEY (`username`) REFERENCES `users` (`username`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- user_reviews
CREATE TABLE `web_project_db`.`user_reviews` (
    `isbn` VARCHAR(255) NOT NULL,
    `username` VARCHAR(255) NOT NULL,
    `review` TEXT,
    `rating` FLOAT,
    `time_submitted` DATETIME DEFAULT (CURRENT_TIMESTAMP),
    `is_updated` BOOLEAN DEFAULT FALSE,
    PRIMARY KEY (`isbn`, `username`),
    FOREIGN KEY (`isbn`) REFERENCES `books` (`isbn`),
    FOREIGN KEY (`username`) REFERENCES `users` (`username`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- tags
CREATE TABLE `web_project_db`.`tags` (
    `isbn` varchar(255) NOT NULL,
    `tag` varchar(255) NOT NULL,
    PRIMARY KEY (`isbn`, `tag`),
    FOREIGN KEY (`isbn`) REFERENCES `books` (`isbn`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;