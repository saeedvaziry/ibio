# iBio

<img width="962" alt="image" src="https://user-images.githubusercontent.com/61919774/212568139-15fe6c31-cc9e-42f4-a2a7-ea42d12fb105.png">

IBio is a free bio link generator for social media like Instagram, TikTok, etc

You can register and get your link and share it on your social media.

The master branch is available on https://ibio.link

Sample link: https://ibio.link/saeedvaziry

## Features

- Links (Video, Music, Button, Text, Email, Phone)
- Metrics (Charts and Statistics)
- Themes
- Social links
- Admin dashboard

## Installation

1) Install dependencies
```shell
# development
composer install

# production
composer install --no-dev
```

2) Create `.env` from `.env.example` and fill it according to your configs

3) Generate key

```shell
php artisan key:generate
```

4) Run the migrations

```shell
php artisan migrate
```

## Admin Dashboard

iBio now has an admin dashboard 🎉

![image](https://user-images.githubusercontent.com/61919774/213862084-fbc788c8-c57b-4666-86c3-af508feed0e9.png)

The default path is `/admin`

There is a separate table named `admins` to hold admin accounts.

### Create an Admin

```
php artisan admin:make "name" "email" "password"
```

## Deployment

To deploy the app into production you can use [VitoDeploy](https://vitodeploy.com)

## What technologies used?

### Back-End

The back-end has been developed with [Laravel framework 9](https://github.com/laravel/laravel)

### Database

Database is Mysql or Mariadb

### Front-End

The front-end has been developed with [Vue.js 2](https://github.com/vuejs/vue), [Inertia.js](https://github.com/inertiajs/inertia), and [Tailwindcss 2](https://tailwindcss.com/)

## Credits

**Admin Dashboard**

[Filamentphp](https://filamentphp.com/)

**Charts**

[Chart.js](https://www.chartjs.org/) with [Vue Charts](https://vue-chartjs.org/)

**Icons**

[Fontawesome](https://fontawesome.com/)

[FlatIcon](https://www.flaticon.com/)

[HeroIcons](https://heroicons.com/)


**Other**

Front-End routes by [tighten](https://github.com/tighten/ziggy)

IP to location [saeedvaziry](https://github.com/saeedvaziry/ip2location)

User-Agent by [jenssegers](https://github.com/jenssegers/agent)

## Security

In case you see any security issues please send it to me directly at (sa.vaziry@gmail.com) or create an issue

## License

This software is licensed under MIT. Check the license [here](https://github.com/saeedvaziry/ibio/blob/master/LICENSE.md)
