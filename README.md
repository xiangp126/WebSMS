- This project aims to implement an 'Enterprise Salary Management System'
- Featured by
    - login check using 'session', better than cookie
    - pagination for all sql query page
    - js on client side, checking form before submit, more speedy
    - draw beautiful pie chart for 'salary tax analysis', as below
![](https://github.com/xiangp126/jear/blob/master/gif/salary_draw.gif)
- Programming Environment
    - PhpMyAdmin SQL Dump version 4.0.10.20
    - MySQL Server version: 5.1.73
    - PHP Version: 5.3.3
    - CentOS 6.9

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

## License
The [MIT](https://github.com/xiangp126/jear/blob/master/LICENSE.txt) License(MIT)
