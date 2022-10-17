document.addEventListener('alpine:init', () => {
    Alpine.data('dateTimeSlotPicker', ({ state, options }) => ({
        state: state,

        options: [],

        selectedDate: null,

        monthStart: new Date(new Date().getFullYear(), new Date().getMonth()),

        init() {
            this.options = options.map((option) => ({
                start: new Date(option[0]),
                end: new Date(option[1]),
            }));
        },

        get month() {
            let month = [];
            let date = new Date(this.monthStart);
            let endOfMonth = new Date(
                this.monthStart.getFullYear(),
                this.monthStart.getMonth() + 1,
                0,
            );

            while (date <= endOfMonth) {
                month.push(new Date(date));
                date.setDate(date.getDate() + 1);
            }

            return month;
        },

        get monthLabel() {
            return (
                this.monthStart.toLocaleString(document.documentElement.lang, {
                    month: 'long',
                }) +
                ' ' +
                this.monthStart.getFullYear()
            );
        },

        get monthStartDay() {
            return ((this.month[0].getDay() + 6) % 7) + 1;
        },

        getWeekDayLabel(index) {
            let date = new Date();
            date.setDate(date.getDate() + (index - date.getDay()));
            return date.toLocaleString(document.documentElement.lang, {
                weekday: 'short',
            });
        },

        get canDecrementMonth() {
            if (this.isPast(this.monthStart)) {
                return false;
            }

            if (this.isToday(this.monthStart)) {
                return false;
            }

            return true;
        },

        decrementMonth() {
            this.addToMonth(-1);
        },

        incrementMonth() {
            this.addToMonth(1);
        },

        addToMonth(months) {
            let date = new Date(this.monthStart.valueOf());
            date.setMonth(date.getMonth() + months);
            this.monthStart = date;
        },

        isSameDate(date, other) {
            if (other === null) {
                return false;
            }

            return (
                new Date(date.toDateString()).valueOf() ===
                new Date(other.toDateString()).valueOf()
            );
        },

        isToday(date) {
            return this.isSameDate(date, new Date());
        },

        isPast(date) {
            return (
                new Date(date.toDateString()).valueOf() <
                new Date(new Date().toDateString()).valueOf()
            );
        },

        isOption(date) {
            return this.options.some((option) =>
                this.isSameDate(date, option.start),
            );
        },

        isSelected(date) {
            return this.isSameDate(date, this.selectedDate);
        },

        selectDate(date) {
            this.selectedDate = date;
        },
    }));
});
