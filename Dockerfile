FROM php:8.1-apache

# Copy semua file ke dalam container
COPY . /var/www/html/

# Aktifkan mod_rewrite (kalau pakai .htaccess)
RUN a2enmod rewrite

EXPOSE 80
