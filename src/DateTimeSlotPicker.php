<?php

namespace ZepFietje\FilamentDateTimeSlotPicker;

use Closure;
use Filament\Forms\Components\Field;

class DateTimeSlotPicker extends Field
{
    protected string $view = 'filament-date-time-slot-picker::field';

    protected array|Closure $options = [];

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
