
# Laravel Pin with Laravel and VueJs

A Simple Pinterest project built with Laravel and Vue.js can be a platform for users to save and discover ideas.


## Demo
![Home Guest](https://storage.googleapis.com/openscreenshot/N%2Fw%2Ff/IMCHPlfwN.png)
Home Guest
![Home Auth](https://storage.googleapis.com/openscreenshot/e%2FD%2FR/4yuy7ORDe.png)
Home Auth
![Upload](https://storage.googleapis.com/openscreenshot/s%2FO%2Fg/4aDLGTgOs.png)
Upload Page
![Login](https://storage.googleapis.com/openscreenshot/N%2FG%2F3/eVAEi-3GN.png)
Auth Page

## Installation

Clone this project using the following commands:

```bash
  git clone https://github.com/geriadam/laravel-pin.git
  cd laravel-pin
```

#### Install Backend

```bash
  cp .env.example .env
  composer install
  php artisan key:generate
  php artisan migrate --seed
  php artisan serve
```

#### Install Frontend

```bash
  npm install
  npm run dev
```

## License

[MIT](https://choosealicense.com/licenses/mit/)

