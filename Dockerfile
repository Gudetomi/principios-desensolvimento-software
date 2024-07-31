FROM php:8.3-fpm

# set your user name, ex: user=carlos
ARG user=yourusername
ARG uid=1000

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    dpkg \
    gnupg \
    libpq-dev \
    libpng-dev \
    libonig-dev \
    libjpeg-dev \
    libxml2-dev \
    libfreetype6-dev \
    zip \
    unzip \
    build-essential 

# Install PHP extensions
#RUN docker-php-ext-install pdo_pgsql mbstring exif pcntl bcmath gd sockets

RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

    # Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Install redis
RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

RUN curl -fsSL https://www.postgresql.org/media/keys/ACCC4CF8.asc | gpg --dearmor -o /usr/share/keyrings/postgresql-archive-keyring.gpg
RUN echo "deb [signed-by=/usr/share/keyrings/postgresql-archive-keyring.gpg] http://apt.postgresql.org/pub/repos/apt/ bookworm-pgdg main" | tee /etc/apt/sources.list.d/pgdg.list
       
RUN apt-get update && apt-get install -y postgresql-client postgresql-server-dev-16
RUN cd /tmp \
    git clone --branch v0.7.3 https://github.com/pgvector/pgvector.git \
    cd pgvector \
    make \
    make install

# Set working directory
WORKDIR /var/www
COPY init-db.sql /docker-entrypoint-initdb.d/
# Copy custom configurations PHP
COPY docker/php/custom.ini /usr/local/etc/php/conf.d/custom.ini

USER $user
