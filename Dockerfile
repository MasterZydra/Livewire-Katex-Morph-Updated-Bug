FROM serversideup/php:8.2-fpm-apache

WORKDIR /var/www/html

COPY . .

RUN cp .env.example .env ; \
    apt-get -y install curl ; \
    apt-get update && apt-get -y install gnupg; \
    curl -fsSL https://deb.nodesource.com/setup_current.x | bash - ; \
    apt-get -y install nodejs ; \
    npm install ; \
    composer install ; \
    chown -R 9999:9999 /var/www/html

EXPOSE 80