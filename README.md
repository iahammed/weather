## Laravel Weather Package
Laravel Package to let us know the 5-day weather forecast for a guest identified only by IP address.

### Api used

OpenWeather: https://openweathermap.org/  

IP-API: https://ipapi.co/  

## Installation

You can install this package via composer:
```bash
$ composer require dfytech/weather
```

Install DfytechWeather configuration
```bash
$ php artisan weather:install
```

Publishing vendor
```bash
$ php artisan vendor:publish --tag=weather
```

## Use

Package is avilable at:
http://<domin>/weather 
