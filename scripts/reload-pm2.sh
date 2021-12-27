#!/bin/bash
cd /var/www/html/
composer update
service apache2 reload