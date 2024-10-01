[![MoveNSee-Test](https://github.com/ThobsChoucroute/movensee-test/actions/workflows/actions.yml/badge.svg)](https://github.com/ThobsChoucroute/movensee-test/actions/workflows/actions.yml)

# Move 'N See Test

## Installation

##### Install composer depencencies
``` composer install ```
##### Install NPM dependencies
``` npm ci ```
##### Generate application key
``` php artisan key:generate ```
##### Install & Run Sail for local Development (If you Docker installed and configured)
``` php artisan sail:install ```
``` vendor/bin/sail up -d ```
##### Migrate Database and seed it
``` vendor/bin/sail artisan migrate --seed ```

##### Test the code
``` vendor/bin/sail test ```

#### And with that we are pretty much good to go !