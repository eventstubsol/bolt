#!/bin/bash
cd /var/www/html/
composer update
chmod -R 777 storage/ bootstrap/cache
service apache2 reload