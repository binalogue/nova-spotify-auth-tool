# Laravel Nova Spotify Auth Tool

[![Latest Version on Packagist](https://img.shields.io/packagist/v/binalogue/nova-spotify-auth-tool.svg?style=flat-square)](https://packagist.org/packages/binalogue/nova-spotify-auth-tool)
[![Build Status](https://img.shields.io/travis/binalogue/nova-spotify-auth-tool/master.svg?style=flat-square)](https://travis-ci.org/binalogue/nova-spotify-auth-tool)
[![Quality Score](https://img.shields.io/scrutinizer/g/binalogue/nova-spotify-auth-tool.svg?style=flat-square)](https://scrutinizer-ci.com/g/binalogue/nova-spotify-auth-tool)
[![Total Downloads](https://img.shields.io/packagist/dt/binalogue/nova-spotify-auth-tool.svg?style=flat-square)](https://packagist.org/packages/binalogue/nova-spotify-auth-tool)

This [Nova](https://nova.laravel.com/) tool adds a Spotify auth section to the Nova Sidebar. Under the hood it uses the [mgoigfer/laravel-spotify-wrapper](https://github.com/mgoigfer/laravel-spotify-wrapper) package.

You can authenticate yourself through Spotify API and store a refresh token to your database.

![Laravel Nova Spotify Auth Tool](./docs/screenshot.png)

## Installation

1. You must install [mgoigfer/laravel-spotify-wrapper](https://github.com/mgoigfer/laravel-spotify-wrapper) into your Laravel app.

2. You can install this package via [Composer](https://getcomposer.org/):

```bash
composer require binalogue/nova-spotify-auth-tool
```

3. Register the tool in `app/Providers/NovaServiceProvider`:

```php
public function tools()
{
    return [
        new \Binalogue\SpotifyAuthTool\SpotifyAuthTool,
    ];
}
```

4. Publish and run the application migrations:

```bash
php artisan vendor:publish --provider="Binalogue\SpotifyAuthTool\SpotifyAuthToolServiceProvider"

php artisan migrate
```

5. Register the following redirect URI in your [Spotify app](https://developer.spotify.com):

```
<APP_URL>/nova-vendor/nova-spotify-auth-tool/auth
```

## Usage

To get the Spotify user ID and the refresh token stored in the database:

```php
use Binalogue\SpotifyAuthTool\Facades\Spotify;

$userId = Spotify::userId();
$refreshToken = Spotify::refreshToken();
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Mikel Goig](https://github.com/mgoigfer)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
