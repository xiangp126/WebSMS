- This project aims to implement an 'Enterprise Salary Management System'
- Featured by
    - encrypted password stored in db with sha1
    - login check using 'session' with 'timeout' set
    - basic edit/add/modify/query page for overtime/leave/bonus/personel/position/salary
    - pay for overtime according to different type, and overtime type support edit/add/modify
    - deduct for leave according to different type, and leave type support edit/add/modify
    - pagination browse for all sql query page
    - additional js on client side, checking form before submit, speedy
    - detailed calculation for 'salary tax analysis'
    - use gapi to draw 3D beautiful pie chart locally for it
- Brief Demo Below
![](https://github.com/xiangp126/jear/blob/master/gif/jear.gif)
- Programming Environment
    - PhpMyAdmin SQL Dump version 4.0.10.20
    - MySQL Server version: 5.1.73
    - PHP Version: 5.3.3
    - CentOS 6.9
    - VIM and My Personel [Giggle](https://github.com/xiangp126/Giggle)

## Quick Deploy
### Pre
```bash
sudo yum install mysql mysql-server php-mysql phpmyadmin httpd -y

sudo service mysqld start
sudo service httpdd start
sudo chkconfig mysqld on
sudo chkconfig httpdd on

```
### Config
- Let mysql use char set 'uts8' refer [my.cnf](https://github.com/xiangp126/Jear/blob/master/config/my.cnf)
- Let phpmyadmin outer access refer [phpMyAdmin.conf](https://github.com/xiangp126/Jear/blob/master/config/phpMyAdmin.conf)
- Change Listen port for apache edit /etc/httpd/conf/httpd.conf

### Deploy
```
copy php/* to your system Apache root (Example /var/www/html )
```

## License
The [MIT](https://github.com/xiangp126/jear/blob/master/LICENSE.txt) License(MIT)
