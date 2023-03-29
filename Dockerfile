FROM php:8.1-cli
RUN apt-get update && apt-get -y install sudo git
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer
RUN adduser dragonx
RUN adduser dragonx sudo
RUN mkdir -p /var/www/html/SymfonyApp
RUN docker-php-ext-install pdo pdo_mysql
COPY . /var/www/html/SymfonyApp
WORKDIR /var/www/html/SymfonyApp
RUN composer install
CMD tail -f /dev/null