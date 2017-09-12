FROM wordpress:4.8.0-php7.1-apache
MAINTAINER Glenn Y. Rolland <glenn.rolland@datatransition.net>

RUN curl -L \
	https://github.com/vrana/adminer/releases/download/v4.3.1/adminer-4.3.1-mysql-en.php \
	-o adminer.php

ADD wp-config.php /var/www/html/wp-config.php

