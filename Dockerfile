FROM php:7.4-apache

# Instala dependências necessárias
RUN apt-get update && apt-get install -y \
    libpq-dev \
    unzip \
    wget \
    && docker-php-ext-configure pgsql --with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pgsql pdo_pgsql \
    && rm -rf /var/lib/apt/lists/*

# Baixa phpPgAdmin
WORKDIR /var/www/html
RUN wget https://github.com/phppgadmin/phppgadmin/archive/REL_7-13-0.tar.gz -O phppgadmin.tar.gz \
    && tar -xzf phppgadmin.tar.gz \
    && mv phppgadmin-REL_7-13-0 phppgadmin \
    && rm phppgadmin.tar.gz

# Copia config customizada
COPY ./conf/config.inc.php /var/www/html/phppgadmin/conf/config.inc.php

EXPOSE 80
CMD ["apache2-foreground"]
