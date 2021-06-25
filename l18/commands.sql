# ROOT

CREATE DATABASE `test_skillup_db`;
CREATE USER 'test_skillup_user' IDENTIFIED BY 'test_skillup_pwd';
GRANT ALL PRIVILEGES ON `test_skillup_db`.* TO 'test_skillup_user';
GRANT ALL PRIVILEGES ON `test_skillup_db`.* TO 'skillup_user';
FLUSH PRIVILEGES;

# ROOT

CREATE TABLE `test_skillup_db`.`users_structure` LIKE `skillup_db`.`users`;

CREATE TABLE `test_skillup_db`.`users_data` AS SELECT * FROM `skillup_db`.`users`;

CREATE TABLE `test_skillup_db`.`users` LIKE `skillup_db`.`users`;
INSERT INTO `test_skillup_db`.`users` SELECT * FROM `skillup_db`.`users`;

CREATE TABLE `user_contacts`
(
    `id`      INT(5)                             NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `contact` VARCHAR(100)                       NOT NULL UNIQUE,
    `type`    ENUM ('email', 'phone', 'address') NOT NULL,
    `user_id` INT(4)                             NOT NULL,
    UNIQUE KEY (`type`, `user_id`),
    CONSTRAINT `fk-user_contacts-user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE ON DELETE RESTRICT
);

ALTER TABLE `user_contacts` RENAME INDEX `type` TO `u-user_contacts-type-user_id`;

INSERT INTO `user_contacts`
    (`contact`, `type`, `user_id`)
VALUES
    ('+380001112233', 'phone', 1),
    ('dmytro@test.com', 'email', 1),
    ('Kiev city, Test street', 'address', 1),
    ('+380004445566', 'phone', 2),
    ('oleg@test.com', 'email', 2),
    ('taras@test.com', 'email', 3);

# Incorrect
INSERT INTO `user_contacts` (`contact`, `type`, `user_id`) VALUES ('+380001112244', 'phone', 1);
INSERT INTO `user_contacts` (`contact`, `type`, `user_id`) VALUES ('+380001112244', 'fax', 1);
INSERT INTO `user_contacts` (`contact`, `type`, `user_id`) VALUES ('+380007778899', 'phone', 10);
# Incorrect

# From CLI (not MySQL)
# mysqldump -uroot skillup_db > /var/lib/mysql/skillup_db.20210625.sql
# mysql -uroot cli_backup_skillup_db < /var/lib/mysql/skillup_db
# From CLI (not MySQL)

SELECT id, `name` FROM `users` WHERE birthday > '1900-01-01' AND `name` = 'Dmytro';
SELECT id, `name` FROM `users` WHERE birthday > '1900-01-01' AND `name` LIKE '_m_t%';
SELECT id, `name` FROM `users` WHERE birthday < '1900-01-01' OR `name` LIKE '_m_t%';
SELECT
    id,
    `name`
FROM `users`
WHERE
    (birthday < '1900-01-01' AND `name` = 'Taras')
   OR (birthday > '1900-01-01' AND `name` LIKE '_m_t%');

SELECT
    users.id,
    users.name,
    user_contacts.type,
    user_contacts.contact
FROM users
         INNER JOIN user_contacts ON users.id = user_contacts.user_id;

SELECT
    users.id,
    users.name,
    user_contacts.type,
    user_contacts.contact
FROM users
         LEFT JOIN user_contacts ON users.id = user_contacts.user_id;

INSERT INTO `users` (name) VALUES ('John Cooper');

SELECT
    users.id,
    users.name,
    user_contacts.type,
    user_contacts.contact
FROM users
         RIGHT JOIN user_contacts ON users.id = user_contacts.user_id;

SELECT
    users.id,
    users.name,
    user_contacts.type,
    user_contacts.contact
FROM users
         LEFT JOIN user_contacts ON users.id = user_contacts.user_id
WHERE type IN ('email', 'phone')
ORDER BY `name` DESC, `type` DESC
LIMIT 2
    OFFSET 2;


SELECT
    users.id,
    users.name,
    COUNT(user_contacts.contact) AS contacts_count
FROM users
         LEFT JOIN user_contacts ON users.id = user_contacts.user_id
GROUP BY users.id
HAVING contacts_count >= 0

SELECT
    COUNT(t.id) AS users_with_contacts
FROM (
         SELECT
             users.id,
             COUNT(user_contacts.contact) AS contacts_count
         FROM users
                  LEFT JOIN user_contacts ON users.id = user_contacts.user_id
         GROUP BY users.id
     ) AS t
WHERE t.contacts_count > 0;

DELETE FROM user_contacts WHERE user_id=3 LIMIT 1;

ALTER TABLE test_skillup_db.users DROP COLUMN birthday;
DROP TABLE test_skillup_db.users;

# ROOT
DROP DATABASE cli_backup_skillup_db;
# ROOT
