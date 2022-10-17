<x-dynamic-component
    :component="$getFieldWrapperView()"
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-action="$getHintAction()"
    :hint-color="$getHintColor()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
>
    <div
        x-data="dateTimeSlotPicker({
            state: $wire.{{ $applyStateBindingModifiers('entangle(\'' . $getStatePath() . '\')') }},
            options: @js($getOptions()),
        })"
        class="w-fit bg-white"
    >
        <div class="flex items-center">
            <span class="flex-1 text-sm font-medium capitalize" x-text="monthLabel"></span>

            <x-forms::icon-button icon="heroicon-s-chevron-left" x-on:click="decrementMonth" x-bind:disabled="!canDecrementMonth" />

            <x-forms::icon-button icon="heroicon-s-chevron-right" x-on:click="incrementMonth" />
        </div>

        <div class="flex">
            <template x-for="index in 7" x-bind:key="index">
                <span
                    class="w-10 gap-2 text-center text-xs font-medium uppercase text-gray-500"
                    x-text="getWeekDayLabel(index)"
                ></span>
            </template>
        </div>

        <div class="grid grid-cols-7 gap-2">
            <template x-for="(date, index) in month" x-bind:key="index">
                <button
                    type="button"
                    class="relative flex h-10 w-10 items-center justify-center rounded-full text-sm transition"
                    x-bind:class="{
                        'after:absolute after:bottom-1 after:h-1 after:w-1 after:rounded-full after:bg-current': isToday(date),
                        'text-gray-500': !isOption(date),
                        'font-semibold': isOption(date),
                        'cursor-pointer bg-primary-100 text-primary-600 hover:bg-primary-200': isOption(date) && !isSelected(date),
                        'bg-primary-600 text-white': isSelected(date),
                    }"
                    x-bind:style="index === 0 ? `grid-column: ${monthStartDay}` : false"
                    x-bind:disabled="!isOption(date) || isSelected(date)"
                    x-text="date.getDate()"
                    x-on:click="isOption(date) && !isSelected(date) ? selectDate(date) : false"
                ></button>
            </template>
        </div>
    </div>
</x-dynamic-component>
