# Filament form field to select a date time slot.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/zepfietje/filament-date-time-slot-picker.svg?style=flat-square)](https://packagist.org/packages/zepfietje/filament-date-time-slot-picker)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/zepfietje/filament-date-time-slot-picker/run-tests?label=tests)](https://github.com/zepfietje/filament-date-time-slot-picker/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/zepfietje/filament-date-time-slot-picker/Check%20&%20fix%20styling?label=code%20style)](https://github.com/zepfietje/filament-date-time-slot-picker/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/zepfietje/filament-date-time-slot-picker.svg?style=flat-square)](https://packagist.org/packages/zepfietje/filament-date-time-slot-picker)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require zepfietje/filament-date-time-slot-picker
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-date-time-slot-picker-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-date-time-slot-picker-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-date-time-slot-picker-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$filament-date-time-slot-picker = new ZepFietje\FilamentDateTimeSlotPicker();
echo $filament-date-time-slot-picker->echoPhrase('Hello, ZepFietje!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Zep Fietje](https://github.com/zepfietje)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
