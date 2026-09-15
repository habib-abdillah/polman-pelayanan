FROM php:7.4-apache

# Install required packages (unzip for Composer dist extraction)
RUN apt-get update && apt-get install -y --no-install-recommends unzip \
    && docker-php-ext-install mysqli pdo_mysql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer from official image
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Configure Apache AllowOverride All so .htaccess works
RUN echo '<Directory /var/www/html>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' > /etc/apache2/conf-available/allow-override.conf \
    && a2enconf allow-override

# Add entrypoint script to automatically run composer install if vendor is missing
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

WORKDIR /var/www/html

ENTRYPOINT ["docker-entrypoint.sh"]
EXPOSE 80
CMD ["apache2-foreground"]
