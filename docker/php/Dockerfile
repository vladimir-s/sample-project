FROM php:7.0-fpm

RUN apt-get update \
  && apt-get install -y php5-dev php-pear php5-common php5-gd \
  && pecl install xdebug \
  && docker-php-ext-enable xdebug \
  && touch /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
  && echo xdebug.remote_autostart=true >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
  && echo xdebug.remote_mode=req >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
  && echo xdebug.remote_handler=dbgp >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
  && echo xdebug.remote_port=9000 >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
  && echo xdebug.remote_host=10.0.75.1 >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
  && echo xdebug.idekey=PHPSTORM >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
  && echo xdebug.remote_enable=1 >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
  && echo xdebug.profiler_append=0 >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
  && echo xdebug.profiler_enable=0 >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
  && echo xdebug.profiler_enable_trigger=1 >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
  && echo xdebug.profiler_output_dir=/var/debug >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
  && echo xdebug.profiler_output_name=cachegrind.out.%s.%u >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
  && echo xdebug.var_display_max_data=-1 >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
  && echo xdebug.var_display_max_children=-1 >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
  && echo xdebug.var_display_max_depth=-1 >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN apt-get install -y git zip unzip
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
