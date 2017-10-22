FROM php:fpm

RUN apt-get update &&\
    apt-get install -y libmcrypt-dev mysql-client zlib1g-dev &&\
    docker-php-ext-install -j$(nproc) mcrypt &&\
    apt-get install -y git vim &&\
    apt-get clean

RUN docker-php-ext-install mbstring
RUN docker-php-ext-install exif
RUN docker-php-ext-install opcache
RUN docker-php-ext-install pcntl
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install zip

RUN yes | pecl install xdebug &&\
    echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini &&\
    echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini &&\
    echo "xdebug.remote_autostart=off" >> /usr/local/etc/php/conf.d/xdebug.ini

RUN echo "$(curl -sS https://composer.github.io/installer.sig) -" > composer-setup.php.sig &&\
    curl -sS https://getcomposer.org/installer | tee composer-setup.php | sha384sum -c composer-setup.php.sig &&\
    php composer-setup.php -- --install-dir=/usr/local/bin --filename=composer &&\
    rm composer-setup.php

WORKDIR /var/www

CMD ["php-fpm"]