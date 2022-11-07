<?php

namespace ZepFietje\FilamentDateTimeSlotPicker;

use Closure;
use Filament\Forms\Components\Field;
use Illuminate\Support\Carbon;

class DateTimeSlotPicker extends Field
{
    protected string $view = 'filament-date-time-slot-picker::field';

    protected array|Closure $options = [];

    protected function setUp(): void
    {
        parent::setUp();

        $this->dehydrateStateUsing(static function (?array $state) {
            if (blank($state)) {
                return null;
            }

            return $state;
            // return array_map(fn ($date): Carbon => Carbon::parse($date), $state);
        });
    }

    public function options(array|Closure $options): static
    {
        $this->options = $options;

        return $this;
    }

    public function getOptions(): array
    {
        return $this->evaluate($this->options);
    }
}
