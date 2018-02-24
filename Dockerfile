FROM php

WORKDIR /var/www/myapp

RUN apt-get update && apt-get install -y wget git zip
RUN wget https://getcomposer.org/installer && php ./installer --install-dir=/usr/local/bin --filename=composer

COPY . .

RUN composer install

EXPOSE "8000"
ENTRYPOINT ["php", "artisan", "serve", "--host", "0.0.0.0"]

