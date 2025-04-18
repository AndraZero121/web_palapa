#!/bin/bash

# Generate app key
php artisan key:generate

# Create storage symbolic link
php artisan storage:link

# Run migrations and seed the database
php artisan migrate:fresh --seed

# Install NPM dependencies and build assets
npm install
npm run build

echo "Installation completed successfully!"