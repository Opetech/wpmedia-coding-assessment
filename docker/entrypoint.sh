#!/bin/bash

# Start cron in the background
cron -f &

# Start PHP-FPM
exec php-fpm