<?php

namespace ZepFietje\FilamentDateTimeSlotPicker;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentDateTimeSlotPickerServiceProvider extends PluginServiceProvider
{
    public static string $name = 'filament-date-time-slot-picker';

    protected array $styles = [
        'plugin-filament-date-time-slot-picker' => __DIR__.'/../resources/dist/filament-date-time-slot-picker.css',
    ];

    protected array $scripts = [
        'plugin-filament-date-time-slot-picker' => __DIR__.'/../resources/dist/filament-date-time-slot-picker.js',
    ];

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasViews();
    }
}
