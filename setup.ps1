# Jalankan dari folder yang berisi folder "faucoffee-overlay" ini.
# Contoh: cd C:\laragon\www  lalu  .\faucoffee-overlay\setup.ps1
composer create-project laravel/laravel faucoffee
Copy-Item -Path ".\faucoffee-overlay\*" -Destination ".\faucoffee" -Recurse -Force -Exclude "setup.ps1"
Set-Location faucoffee
if (-not (Test-Path database\database.sqlite)) { New-Item database\database.sqlite -ItemType File | Out-Null }
(Get-Content .env) -replace '^DB_CONNECTION=.*','DB_CONNECTION=sqlite' -replace '^APP_NAME=.*','APP_NAME=FauCoffee' -replace '^APP_LOCALE=.*','APP_LOCALE=id' | Set-Content .env
Add-Content .env "`nADMIN_PASSWORD=admin123`nWA_NUMBER=6281234567890"
php artisan key:generate
php artisan migrate:fresh --seed
php artisan storage:link
php artisan serve
