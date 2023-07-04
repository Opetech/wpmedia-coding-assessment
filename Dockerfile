FROM php:7.4-fpm

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Install system dependencies
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        cron \
        libzip-dev \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install \
        opcache \
        pdo_mysql \
        zip

# Copy the crontab file
COPY ./docker/crontab /etc/cron.d/crontab

# Set permissions for the crontab file
RUN chmod 0644 /etc/cron.d/crontab

# Adjust permissions for cron
RUN chmod gu+rw /var/run
RUN chmod gu+s /usr/sbin/cron

# Create the cron log file
RUN touch /var/log/cron.log

# Copy the custom entrypoint script
COPY ./docker/entrypoint.sh /usr/local/bin/entrypoint.sh

# Make the entrypoint script executable
RUN chmod +x /usr/local/bin/entrypoint.sh

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Set the entrypoint command
ENTRYPOINT ["bash", "/usr/local/bin/entrypoint.sh"]

# Set working directory
WORKDIR /var/www

USER $user
