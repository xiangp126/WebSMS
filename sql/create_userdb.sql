--  Notice !
--  Replace blank and dusk with the real user_name and user_password you use
--  %s/blank/xx/gc
--  https://www.dashlane.com/zh/features/password-generator

--  > mysql -u root -p
--  mysql > source create_userdb.sql

use mysql;
create user 'blank'@'localhost' identified by 'dusk';
flush privileges;
create database salary_system;
grant all privileges on salary_system.* to blank@localhost identified by 'dusk';
flush privileges;
