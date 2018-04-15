--  Notice !
--  Replace user_name and user_password and user_database with the real you use
--  > mysql -u root -p
--  mysql > source This.sql

use mysql;
create user 'user_name'@'localhost' identified by 'user_password';
flush privileges;
create database user_database;
grant all privileges on user_database.* to user_name@localhost identified  by 'user_password';
flush privileges;

