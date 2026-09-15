#!/bin/bash
set -e

# If vendor/autoload.php does not exist, install exact dependencies locked in composer.lock
if [ ! -f "/var/www/html/vendor/autoload.php" ]; then
    echo "==> vendor/autoload.php not found. Installing dependencies from composer.lock..."
    composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader
fi

exec "$@"
