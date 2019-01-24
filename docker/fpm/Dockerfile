FROM php:7-fpm

#COPY . /code/

RUN docker-php-ext-install mbstring
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install shmop

#error: /usr/src/php/ext/mcyrpt does not exist
#RUN docker-php-ext-install mcyrpt

#error: /usr/src/php/ext/redis does not exist
#RUN docker-php-ext-install redis

# requires jpg and png libraries
#RUN docker-php-ext-install gd

#error: /usr/src/php/ext/memcached does not exist
#RUN docker-php-ext-install memcached

WORKDIR /code/
