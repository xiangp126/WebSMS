### Illustrate
- This project aims to implement an **Enterprise Salary Management System** / WEB
- Featured by
    - encrypt password with sha1
    - login check using `session` mechanism
    - basic edit/add/modify/query page for overtime/leave/bonus/personel/position/salary
    - pay for `overtime` according to different type, and `overtime` type support edit/add/modify
    - deduct for `leave` according to different type, and `leave` type support edit/add/modify
    - pagination browse for all sql query page
    - additional js on client side, checking form before submit, speedy
    - detailed calculation for `salary tax analysis`
    - use GAPI to draw **3D Pie Chart** locally for it
- Brief Demo Below
![](./gif/demo.gif)
- Programming Environment
    - PhpMyAdmin SQL Dump version 4.0.10.20
    - MySQL Server version: 5.1.73
    - PHP Version: 5.3.3
    - CentOS 6.9
    - VIM and My Personal [CrossLv](https://github.com/xiangp126/Giggle)
- Current stable released version: v1.0

### Quick Deploy
#### Pre
- CentOS 7

```bash
# Need install php5
sudo yum install mysql mysql-server php-mysql phpmyadmin httpd -y
sudo yum install mariadb-server

sudo systemctl start mariadb.service
sudo systemctl start httpd.service

systemctl enable mariadb.service
systemctl enable httpd.service
```

- CentOS 6

```bash
# Need install php5
sudo yum install mysql mysql-server php-mysql phpmyadmin httpd -y

sudo service mysqld start
sudo service httpd start

sudo chkconfig mysqld on
sudo chkconfig httpd on
```

- Ubuntu

```bash
sudo apt-get install mysql-server phpmyadmin apache2 -y
sudo add-apt-repository ppa:ondrej/php
sudo apt-get update
sudo apt-get install php5.6-mysql

sudo service mysql start
sudo service apache2 start
```

#### Config
- How to make MySQL use 'UTF8' char set, refer [my.cnf](./config/my.cnf)
- How to open outer access permit for phpMyAdmin, pls refer [phpMyAdmin.conf](./config/phpMyAdmin.conf)
- Want to Change Listen port for Apache? just edit `/etc/httpd/conf/httpd.conf`

#### Deploy
```
copy php/* to Apache root of your OS system(E.g. /var/www/html)
```

### License
The [MIT](./LICENSE.txt) License(MIT)
