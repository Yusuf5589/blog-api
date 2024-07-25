# PHP 8.2 tabanlı imaj kullanıyoruz
FROM php:8.2-fpm

# Sistem paketlerini ve gerekli bağımlılıkları kuruyoruz
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    supervisor \
    cron \
    libicu-dev

# PHP eklentilerini kuruyoruz
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install zip pdo pdo_mysql intl

# Composer'ı kuruyoruz
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Çalışma dizinini ayarlıyoruz
WORKDIR /var/www/html

# Laravel uygulama dosyalarını kopyalıyoruz
COPY . .

# Laravel bağımlılıklarını yüklüyoruz
# RUN composer install --no-dev --optimize-autoloader

# Supervisord konfigürasyon dosyasını kopyalıyoruz
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# start-container.sh dosyasını kopyalıyoruz
COPY start-container /usr/local/bin/start-container

# start-container.sh dosyasındaki satır sonlarını Unix tarzı satır sonlarına dönüştürüyoruz
RUN sed -i 's/\r$//' /usr/local/bin/start-container

# start-container.sh dosyasını yürütülebilir yapıyoruz
RUN chmod +x /usr/local/bin/start-container

# Crontab dosyasını kopyalıyoruz
COPY laravel-cron /etc/cron.d/laravel-cron

# Crontab dosyasına doğru izinleri veriyoruz
RUN chmod 0644 /etc/cron.d/laravel-cron

# Çalışma dizinindeki izinleri düzenliyoruz
RUN chown -R www-data:www-data /var/www/html

# Uygulama 8181 portunda çalışacak
EXPOSE 8181

# start-container.sh dosyasını giriş noktası olarak ayarlıyoruz
ENTRYPOINT ["start-container"]
