FROM nginx:mainline-alpine

RUN rm /etc/nginx/conf.d/*
ADD web-php.conf /etc/nginx/conf.d/

RUN rm /usr/share/nginx/html/index.html
COPY src /usr/share/nginx/html

RUN apk update && apk upgrade
RUN apk add bash
RUN apk add php8 php8-fpm php8-opcache
RUN apk add php8-gd php8-zlib php8-curl php8-session

COPY server/etc/php /etc/php8

RUN mkdir /var/run/php
STOPSIGNAL SIGTERM
CMD ["/bin/bash", "-c", "php-fpm8 && chmod 777 /var/run/php/php8-fpm.sock && chmod 755 /usr/share/nginx/html/* && nginx -g 'daemon off;'"]
