# Set the base image to the official PHP image with Apache
FROM php:7.4-apache

# Install required extensions and utilities
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libpq-dev \
    libxml2-dev \
    libzip-dev \
    unzip \
    git \
    curl

# Install PHP extensions
RUN docker-php-ext-install \
    pdo_mysql \
    pdo_pgsql \
    gd \
    xml \
    zip

RUN docker-php-ext-install mysqli

# Enable Apache modules
RUN a2enmod rewrite

RUN echo 'ServerName 127.0.0.1' >> /etc/apache2/apache2.conf

# Remove the current html file in the www/html directory
# RUN rm /var/www/html/index.html

# Copy the application code into the container
COPY . /var/www/html/

# Set the working directory to the application directory
WORKDIR /var/www/html

# Install Composer
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install dependencies with Composer
# RUN composer install

# Expose port 80 for web traffic
EXPOSE 80

# Set environment variables for MySQL connection
# ENV MYSQL_HOST db
# ENV MYSQL_PORT 3306
# ENV MYSQL_DATABASE stagedb
# ENV MYSQL_USER root
# ENV MYSQL_PASSWORD root

# Start Apache and MySQL
# CMD service apache2 start \
# && service database start && \
# tail -f /dev/null

# Command to Build app in local env
# docker build -t myapp .

# volumes:
#       - ./config:/config
#       - ./torrents:/torrents
#       - ./downloads:/downloads