
## Installation


Please check the official laravel installation guide for server requirements before you start. Official Documentation
Alternative installation is possible without local dependencies relying on Docker.

Clone the repository

- git clone https://github.com/sagytt/States_Project.git
- composer install
- npm install
- npm run dev
- php artisan migrate
- php artisan db:seed
- php artisan serve

To block access from israel.
Try changing the 'app/Http/Middleware/CountryBlocker.php' variable to this $blockedCountries = ['US']; since it's localhost ip address it will detect the 127.0.0.1.
