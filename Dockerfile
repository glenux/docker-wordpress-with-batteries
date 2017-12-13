FROM wordpress:4.9.1-php7.1-apache
MAINTAINER Glenn Y. Rolland <glenn.rolland@datatransition.net>

VOLUME /var/www/html

RUN curl -L \
	https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
	-o /usr/local/bin/wp && \
	chmod +x /usr/local/bin/wp

RUN mkdir /usr/local/adminer && \
	curl -L \
	https://github.com/vrana/adminer/releases/download/v4.3.1/adminer-4.3.1-mysql-en.php \
	-o /usr/local/adminer/adminer.php && \
	ln -s /usr/local/adminer/adminer.php adminer.php

RUN apt-get update && \
    apt-get install less && \
    apt-get autoremove

ADD php-uploads.ini /usr/local/etc/php/conf.d/uploads.ini
ADD wp-config.php /var/www/html/wp-config.php

EXPOSE 80
