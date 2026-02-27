# Imagem base
FROM php:8.3-fpm

# Argumentos para UID e GID 
ARG UID
ARG GID

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    libonig-dev \
    libzip-dev \
    && docker-php-ext-install \
        pdo_mysql \
        mbstring \
        bcmath \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Cria grupo e usuário alinhados ao host
RUN groupadd -g ${GID} app \
    && useradd -u ${UID} -g app -m app

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define diretório de trabalho
WORKDIR /var/www

# Define permissões corretas
RUN chown -R app:app /var/www

# Copia entrypoint
COPY docker/php/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Troca para usuário não-root
USER app

# Expõe porta padrão do PHP-FPM
EXPOSE 9000

CMD ["/entrypoint.sh"]