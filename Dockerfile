FROM php:7.2-apache

# Corrige os repositórios do Debian Buster (movidos para archive)
RUN sed -i 's|http://security.debian.org/debian-security|http://archive.debian.org/debian-security|g' /etc/apt/sources.list && \
    sed -i 's|http://deb.debian.org/debian|http://archive.debian.org/debian|g' /etc/apt/sources.list && \
    sed -i '/buster-updates/d' /etc/apt/sources.list

# Instala dependências necessárias
RUN apt-get update && apt-get install -y \
    libpq-dev \
    unzip \
    wget \
    && docker-php-ext-configure pgsql --with-pgsql=/usr \
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