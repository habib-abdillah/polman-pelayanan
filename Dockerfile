FROM php:7.4-apache

# Install mysqli and pdo_mysql extensions (built into PHP, no extra apt libs needed)
RUN docker-php-ext-install mysqli pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Configure Apache AllowOverride All so .htaccess works
RUN echo '<Directory /var/www/html>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' > /etc/apache2/conf-available/allow-override.conf \
    && a2enconf allow-override

WORKDIR /var/www/html

EXPOSE 80
CMD ["apache2-foreground"]
