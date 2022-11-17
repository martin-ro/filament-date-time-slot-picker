<?php

namespace ZepFietje\FilamentDateTimeSlotPicker;

use Closure;
use Filament\Forms\Components\Field;
use Filament\Support\Concerns\HasExtraAttributes;
use Illuminate\Support\Carbon;

class DateTimeSlotPicker extends Field
{
    use HasExtraAttributes;

    protected string $view = 'filament-date-time-slot-picker::field';

    protected array|Closure $options = [];

    protected string | Closure | null $timezone = 'UTC';

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

    public function timezone(string | Closure | null $timezone): static
    {
        $this->timezone = $timezone;

        return $this;
    }

    public function getTimezone(): string
    {
        return $this->evaluate($this->timezone);
    }
}
