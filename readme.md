
## Repository 

Here the Link:

- [l5-repository](http://andersonandra.de/l5-repository/).
- [l5-repository-Park](https://github.com/hangsopheak/l5-repository).

Laravel 5 Repositories is used to abstract the data layer, making our application more flexible to maintain.

## Laravel Grid View

- [Laravel Grid View Demo](http://laravel-grid.herokuapp.com/).
- [Laravel Grid View Gitlab](https://github.com/leantony/laravel-grid).

A laravel command is available to make it easy to create grids. It's usage is as shown below;
```shell
php artisan make:grid --model="{modelClass}"
```

Just make sure you replace {modelClass} with your actual eloquent model class. E.g
```shell
php artisan make:grid --model="App\User"
```

## Laravel Language

- [Easy localization for Laravel](https://github.com/mcamara/laravel-localization).
Just update your composer
```shell
composer update
```
- [Laravel JS localization](https://github.com/rmariuzzo/Laravel-JS-Localization).
Regenerate the new JS language file
### Generating JS messages

```shell
php artisan lang:js
```

### Specifying a custom target

```shell
php artisan lang:js public/lang/lang.dist.js
```

### Other JavaScript Library
- [JQuery Toast](https://github.com/kamranahmedse/jquery-toast-plugin)
- [Loading Overlay](https://gasparesganga.com/labs/jquery-loading-overlay/)
- [JQuery Validation](https://jqueryvalidation.org/)
- [JQuery Form](http://jquery.malsup.com/form/)
- [JQuery Confirm](http://craftpip.github.io/jquery-confirm/)
- [JQuery Print](https://github.com/DoersGuild/jQuery.print)

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [sovann0101@gmail.com](mailto:sovann0101@gmail.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
