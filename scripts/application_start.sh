#!/bin/bash

# give permission to the files inside /secure_docs directory

sudo chmod -R 775 /var/www/html/Development

# navigate into current working directory

cd /var/www/html/Development

# install node modules

npm install

# start our node app in the background using pm2

sudo pm2 start ‘npm start.’