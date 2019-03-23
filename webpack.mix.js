const mix = require('laravel-mix');
const Notifications = require('pretty-mix-notifications');
const TailwindCSS = require('laravel-mix-tailwind');
const PurgeCSS = require('laravel-mix-purgecss');

mix.extend('prettyNotifications', new Notifications)
    .js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .version()
    .tailwind()
    .purgeCss()
    .prettyNotifications();
