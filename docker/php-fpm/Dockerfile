FROM php:8.3-fpm-alpine

#-----------------------------------------------------------------------------------------------------------------------
# Setting Defaut timezone
RUN cp /usr/share/zoneinfo/America/Sao_Paulo /etc/localtime && \
    echo "America/Sao_Paulo" > /etc/timezone; exit 0;

#-----------------------------------------------------------------------------------------------------------------------
# Override php.ini settings
COPY docker/php-fpm/confs/php-development-overrides.ini /usr/local/etc/php/conf.d/99-overrides.ini

#-----------------------------------------------------------------------------------------------------------------------
# Replace php-fpm www.conf variables
# [repo-application]/php-fpm-overrides/php-fpm-www.conf
RUN rm -f /usr/local/etc/php-fpm.d/www.conf
COPY docker/php-fpm/confs/php-fpm-www-development.conf /usr/local/etc/php-fpm.d/www.conf

RUN apk update; \
    apk upgrade;

RUN apk add libzip-dev
RUN docker-php-ext-install zip

RUN apk add --no-cache pcre-dev $PHPIZE_DEPS && \
    apk add --update linux-headers && \
    pecl update-channels && \
    pecl install redis && \
    pecl install xdebug && \
    docker-php-ext-enable redis && \
    docker-php-ext-enable xdebug && \
    apk del $PHPIZE_DEPS

RUN docker-php-ext-install \
    pdo \
    pdo_mysql

# Install PHP xdebug
RUN echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.start_with_request=trigger" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host=172.17.0.1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_port=9003" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.idekey=VSCODE" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.discover_client_host=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.connection_timeout_ms=2000" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Install PHP Composer
RUN curl -sS https://getcomposer.org/installer | php \
    && chmod +x composer.phar && mv composer.phar /usr/local/bin/composer