<?php

exec("composer install");
exec("npm install");
exec("npx mix");
exec("cp .env.example .env");
exec("php artisan key:generate");

echo "Ready\n";
