<?php

namespace ZepFietje\FilamentDateTimeSlotPicker\Tests;

use Filament\FilamentServiceProvider;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use ZepFietje\FilamentDateTimeSlotPicker\FilamentDateTimeSlotPickerServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            LivewireServiceProvider::class,
            FilamentServiceProvider::class,
            FilamentDateTimeSlotPickerServiceProvider::class,
        ];
    }
}
