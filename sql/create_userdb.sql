--  Notice !
--  Replace user_name and user_password with the real you use
--  > mysql -u root -p
--  mysql > source create_userdb.sql

use mysql;
create user 'user_name'@'localhost' identified by 'user_password';
flush privileges;
create database salary_system;
grant all privileges on salary_system.* to user_name@localhost identified  by 'user_password';
flush privileges;
