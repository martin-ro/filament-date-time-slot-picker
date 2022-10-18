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
        class="flex w-fit flex-col gap-6 bg-white p-6 sm:grid sm:grid-cols-5"
    >
        <div class="col-span-3 flex flex-col gap-4">
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

        <template x-if="selectedDate !== null">
            <div class="col-span-2 flex flex-col gap-4">
                <div
                    class="flex h-10 items-center text-sm font-medium capitalize"
                    x-text="selectedDate.toLocaleDateString(document.documentElement.lang, { weekday: 'long', month: 'long', day: 'numeric' })"
                ></div>

                <div class="flex flex-col gap-3">
                    <template x-for="(option, index) in getOptionsForDate(selectedDate)" x-bind:key="index">
                        <div class="grid grid-cols-2 gap-2">
                            <button
                                type="button"
                                class="rounded border p-4 text-sm font-semibold"
                                x-bind:class="{
                                    'col-span-2 border-primary-400 text-primary-600 hover:border-primary-600 hover:ring-1 hover:ring-inset hover:ring-primary-600 focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600': option !== selectedOption,
                                    'col-span-1 border-gray-600 bg-gray-600 text-white': option === selectedOption,
                                }"
                                x-bind:disabled="selectedOption === option"
                                x-text="option.start.toLocaleTimeString(document.documentElement.lang, { hour: '2-digit', minute: '2-digit' })"
                                x-on:click="selectedOption = option"
                            ></button>

                            <button
                                type="button"
                                class="rounded bg-primary-600 text-sm font-semibold text-white"
                                x-show="selectedOption === option"
                                x-on:click="setState(option)"
                            >
                                Confirm
                            </button>
                        </div>
                    </template>
                </div>
            </div>
        </template>
    </div>
</x-dynamic-component>
