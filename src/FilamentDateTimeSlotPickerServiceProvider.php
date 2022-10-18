<?php

namespace ZepFietje\FilamentDateTimeSlotPicker;

use Filament\Facades\Filament;
use Filament\PluginServiceProvider;

class FilamentDateTimeSlotPickerServiceProvider extends PluginServiceProvider
{
    public static string $name = 'filament-date-time-slot-picker';

    protected array $styles = [
        'plugin-filament-date-time-slot-picker' => __DIR__.'/../resources/dist/filament-date-time-slot-picker.css',
    ];

    protected array $beforeCoreScripts = [
        'plugin-filament-date-time-slot-picker' => __DIR__.'/../resources/dist/filament-date-time-slot-picker.js',
    ];

    public function packageBooted(): void
    {
        foreach ($this->styles as $name => $path) {
            Filament::registerRenderHook(
                'head.end',
                fn (): string => '<link rel="stylesheet" href="'.route('filament.asset', ['file' => "$name.css"]).'" />',
            );
        }
    }
}
