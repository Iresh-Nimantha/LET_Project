#!/bin/bash
cd /var/www/html

# Render requires web servers to bind to the dynamic $PORT environment variable.
# We replace Apache's default port 80 with the assigned $PORT at runtime (defaults to 80 locally).
sed -i "s/80/${PORT:-80}/g" /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

# Ensure storage links and caching are fresh for production
php artisan optimize:clear
php artisan storage:link

# Fix permissions for runtime generated files (logs, cache, etc)
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Start the Apache server in the foreground
apache2-foreground
