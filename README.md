### Illustrate
- This project aims to implement an **Enterprise Salary Management System** / WEB
- Featured by
    - encrypt password with `sha1`
    - login check using `session` mechanism
    - basic edit/add/modify/query page for overtime/leave/bonus/personel/position/salary
    - pay for `overtime` according to different type, and `overtime` type support edit/add/modify
    - deduct for `leave` according to different type, and `leave` type support edit/add/modify
    - pagination browse for all sql query page
    - additional js on client side, checking form before submit, speedy
    - detailed calculation for `salary tax analysis`
    - use **GAPI** to draw **3D Pie Chart** locally for it
- Brief Demo Below
![](./gif/demo.gif)
- Programming Environment
    - PhpMyAdmin SQL Dump version 4.4.15.10
    - MySQL Server version: 5.5.64-MariaDB MariaDB Server
    - PHP Version: 5.3.3
    - CentOS Linux release 7.7.1908 (Core)
    - VIM and My Personal [CrossLv](https://github.com/xiangp126/CrossLv)
- Current stable released version: v1.0

### Contents
- [Prerequisite Install](#preinstall)
- [Setup Database](#setupdb)
    - [connect to MySQL for the first time](#connectmysql)
    - [update New Password for root](#updatepasswd)
    - [make MySQL use UTF-8 char set to support Chinese?](#utf8formysql)
    - [reset root password in case of forgotten](#resetrootpwd)
- [Setup phpMyAdmin](#setupmyadmin)
    - [allow remote access for phpMyAdmin?](#remoteaccess)

<a id=preinstall></a>
### Prerequisite Install
#### CentOS 7
- systemd instead of service wraps
- seems to use mariadb rather than mysql as default db

```bash
# Need install php5, must check the version
sudo yum install php mysql php-mysql phpmyadmin httpd -y
sudo yum install mariadb mariadb-server

sudo systemctl start mariadb.service
sudo systemctl start httpd.service

systemctl enable mariadb.service
systemctl enable httpd.service
```

#### CentOS 6
```bash
# Need install php5, must check the version
sudo yum install php
sudo yum install mysql mysql-server php-mysql phpmyadmin httpd -y

sudo service mysqld start
sudo service httpd start

sudo chkconfig mysqld on
sudo chkconfig httpd on
```

#### Ubuntu
```bash
sudo apt-get install mysql-server phpmyadmin apache2 -y
sudo add-apt-repository ppa:ondrej/php
sudo apt-get update
sudo apt-get install php5.6-mysql

sudo service mysql start
sudo service apache2 start
```

<a id=setupdb></a>
### Setup Database
<a id=connectmysql></a>
#### connect to MySQL for the first time

password for root is empty

```bash
mysql -u root

MariaDB [(none)]> use mysql;
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed

MariaDB [mysql]> select user,host,password from user;
+------+-----------+----------+
| user | host      | password |
+------+-----------+----------+
| root | localhost |          |
| root | latch-3   |          |
| root | 127.0.0.1 |          |
| root | ::1       |          |
|      | localhost |          |
|      | latch-3   |          |
+------+-----------+----------+
6 rows in set (0.00 sec)
```

<a id=updatepasswd></a>
#### update New Password for root
e.g. set password of root to 'dusk'

```sql
MariaDB [mysql]> update user set password=password('dusk') where user='root';
Query OK, 4 rows affected (0.00 sec)
Rows matched: 4  Changed: 4  Warnings: 0

MariaDB [mysql]> select user,host,password from user;
+------+-----------+-------------------------------------------+
| user | host      | password                                  |
+------+-----------+-------------------------------------------+
| root | localhost | *AD5EEA21BB6B63266EB6A2050C1336319A969190 |
| root | latch-3   | *AD5EEA21BB6B63266EB6A2050C1336319A969190 |
| root | 127.0.0.1 | *AD5EEA21BB6B63266EB6A2050C1336319A969190 |
| root | ::1       | *AD5EEA21BB6B63266EB6A2050C1336319A969190 |
|      | localhost |                                           |
|      | latch-3   |                                           |
+------+-----------+-------------------------------------------+
6 rows in set (0.00 sec)

MariaDB [mysql]> flush privileges;
Query OK, 0 rows affected (0.00 sec)

MariaDB [mysql]> quit
Bye
```

- login again

```sql
> mysql -u root -p
Enter password:
Welcome to the MariaDB monitor.  Commands end with ; or \g.
Your MariaDB connection id is 5
Server version: 5.5.64-MariaDB MariaDB Server

MariaDB [(none)]> use mysql;
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
MariaDB [mysql]> select user,host,password from user;
+------+-----------+-------------------------------------------+
| user | host      | password                                  |
+------+-----------+-------------------------------------------+
| root | localhost | *AD5EEA21BB6B63266EB6A2050C1336319A969190 |
| root | latch-3   | *AD5EEA21BB6B63266EB6A2050C1336319A969190 |
| root | 127.0.0.1 | *AD5EEA21BB6B63266EB6A2050C1336319A969190 |
| root | ::1       | *AD5EEA21BB6B63266EB6A2050C1336319A969190 |
|      | localhost |                                           |
|      | latch-3   |                                           |
+------+-----------+-------------------------------------------+
6 rows in set (0.01 sec)
```

<a id=utf8formysql></a>
#### make MySQL use `UTF-8` char set to support Chinese?
- check char set suitable for MySQL

```
MariaDB [mysql]> show variables like 'character%';
+--------------------------+----------------------------+
| Variable_name            | Value                      |
+--------------------------+----------------------------+
| character_set_client     | utf8                       |
| character_set_connection | utf8                       |
| character_set_database   | latin1                     |
| character_set_filesystem | binary                     |
| character_set_results    | utf8                       |
| character_set_server     | latin1                     |
| character_set_system     | utf8                       |
| character_sets_dir       | /usr/share/mysql/charsets/ |
+--------------------------+----------------------------+
8 rows in set (0.00 sec)
```

default char set for database is `latin1` which doesn't support Chinese

```
| character_set_database   | latin1                     |
```

- specify `utf8` character set for specific blcok

```bash
sudo vim /etc/my.cnf

# add this line      <======= here
[client]
default-character-set=utf8

# add this line      <======= here
[mysql]
default-character-set=utf8

[mysqld]
#...
# skip-grant-tables
##...
datadir=/var/lib/mysql
socket=/var/lib/mysql/mysql.sock
# Disabling symbolic-links is recommended to prevent assorted security risks
symbolic-links=0
# add this line      <======= here
character-set-server=utf8
```

- restart mariadb service

```bash
sudo systemctl restart mariadb.service
```

- check char set

```sql
$ mysql -u root -p
Enter password:
Welcome to the MariaDB monitor.  Commands end with ; or \g.
Your MariaDB connection id is 3
Server version: 5.5.64-MariaDB MariaDB Server

MariaDB [(none)]> use mysql;
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
MariaDB [mysql]> show variables like 'character%';
+--------------------------+----------------------------+
| Variable_name            | Value                      |
+--------------------------+----------------------------+
| character_set_client     | utf8                       |
| character_set_connection | utf8                       |
| character_set_database   | utf8                       |
| character_set_filesystem | binary                     |
| character_set_results    | utf8                       |
| character_set_server     | utf8                       |
| character_set_system     | utf8                       |
| character_sets_dir       | /usr/share/mysql/charsets/ |
+--------------------------+----------------------------+
8 rows in set (0.00 sec)
```

OK! it changes to utf8!

```
| character_set_database   | utf8                       |
```

<a id=resetrootpwd></a>
#### reset root password in case of forgotten
- sudo vim /etc/my.cnf

```bash
[mysqld]
datadir=/var/lib/mysql
socket=/var/lib/mysql/mysql.sock
# Disabling symbolic-links is recommended to prevent assorted security risks
symbolic-links=0
# Settings user and group are ignored when systemd is used.
# If you need to run mysqld under a different user or group,
# customize your systemd unit file for mariadb according to the
# instructions in http://fedoraproject.org/wiki/Systemd

[mysqld_safe]
log-error=/var/log/mariadb/mariadb.log
pid-file=/var/run/mariadb/mariadb.pid

#
# include all files from the config directory
#
!includedir /etc/my.cnf.d
```

- add **skip-grant-tables** in block `mysqld`

```bash
[mysqld]
# add this line...
skip-grant-tables
# ...
datadir=/var/lib/mysql
socket=/var/lib/mysql/mysql.sock
# Disabling symbolic-links is recommended to prevent assorted security risks
symbolic-links=0
# Settings user and group are ignored when systemd is used.
# If you need to run mysqld under a different user or group,
# customize your systemd unit file for mariadb according to the
# instructions in http://fedoraproject.org/wiki/Systemd

[mysqld_safe]
log-error=/var/log/mariadb/mariadb.log
pid-file=/var/run/mariadb/mariadb.pid

#
# include all files from the config directory
#
!includedir /etc/my.cnf.d
```

- restart mariadb service

```bash
sudo systemctl restart mariadb.service
# then you can login with `mysql -u root`
```

### Setup Apache(httpd)
- see the version installed - 2.4

```bash
> httpd -v
Server version: Apache/2.4.6 (CentOS)
Server built:   Aug  8 2019 11:41:18
```

- listen port for Apache? just edit `/etc/httpd/conf/httpd.conf`

```bash
# change listen port from 80 to 8088 for example
> sudo vim /etc/httpd/conf/httpd.conf
# Change this to Listen on specific IP addresses as shown below to
# prevent Apache from glomming onto all bound IP addresses.
#
#Listen 12.34.56.78:80
Listen 8088
...
```

and then

```bash
sudo systemctl restart httpd.service

# or separately
sudo systemctl stop httpd.service
sudo systemctl start httpd.service
```

<a id= setupmyadmin></a>
### Setup phpMyAdmin
<a id=remoteaccess></a>
#### allow remote access for phpMyAdmin?
```bash
sudo vim /etc/httpd/conf.d/phpMyAdmin.conf
```

find some block just like `Directory /usr/share/phpMyAdmin/`

```html
<Directory /usr/share/phpMyAdmin/>
   AddDefaultCharset UTF-8

   <IfModule mod_authz_core.c>
     # Apache 2.4
     <RequireAny>
       Require ip 127.0.0.1
       Require ip ::1
     </RequireAny>
   </IfModule>
   <IfModule !mod_authz_core.c>
     # Apache 2.2
     Order Deny,Allow
     Deny from All
     Allow from 127.0.0.1
     Allow from ::1
   </IfModule>
</Directory>
```

change to

```html
<Directory /usr/share/phpMyAdmin/>
   AddDefaultCharset UTF-8

   <IfModule mod_authz_core.c>
     # Apache 2.4
     <RequireAny>
     # add one line       <======== here
       Require all granted
       Require ip 127.0.0.1
       Require ip ::1
     </RequireAny>
   </IfModule>
   <IfModule !mod_authz_core.c>
     # Apache 2.2
     # change two lines   <======== here
     Order Allow,Deny
     Allow from All
     Allow from 127.0.0.1
     Allow from ::1
   </IfModule>
</Directory>
```



### Want to Deploy and Make `QUIZ` Work?
- restore files under Directory **php** to Apache root of your OS system, E.g. `/var/www/html`

```bash
sudo cp -r php/* /var/www/html/
```

- make Apache recognize index.php as default index page as well

```bash
> sudo vim /etc/httpd/conf/httpd.conf
#
# DirectoryIndex: sets the file that Apache will serve if a directory
# is requested.
#
<IfModule dir_module>
    DirectoryIndex index.html
</IfModule>
```

to

```bash
#
# DirectoryIndex: sets the file that Apache will serve if a directory
# is requested.
#
<IfModule dir_module>
    DirectoryIndex index.html php.index
</IfModule>
```

and restart httpd later

```bash
sudo systemctl restart httpd.service
```

### License
The [MIT](./LICENSE.txt) License(MIT)
