(()=>{document.addEventListener("alpine:init",()=>{Alpine.data("dateTimeSlotPicker",({state:a,options:n})=>({state:a,options:[],selectedDate:null,selectedOption:null,monthStart:new Date(new Date().getFullYear(),new Date().getMonth()),init(){this.options=n.map(t=>({start:new Date(t[0]),end:new Date(t[1])}))},get locale(){return document.documentElement.lang},get month(){let t=[],e=new Date(this.monthStart),i=new Date(this.monthStart.getFullYear(),this.monthStart.getMonth()+1,0);for(;e<=i;)t.push(new Date(e)),e.setDate(e.getDate()+1);return t},get monthLabel(){return this.monthStart.toLocaleString(this.locale,{month:"long"})+" "+this.monthStart.getFullYear()},get monthStartDay(){return(this.month[0].getDay()+6)%7+1},getWeekDayLabel(t){let e=new Date;return e.setDate(e.getDate()+(t-e.getDay())),e.toLocaleString(this.locale,{weekday:"short"})},get canDecrementMonth(){return!(this.isPast(this.monthStart)||this.isToday(this.monthStart))},decrementMonth(){this.addToMonth(-1)},incrementMonth(){this.addToMonth(1)},addToMonth(t){let e=new Date(this.monthStart.valueOf());e.setMonth(e.getMonth()+t),this.monthStart=e},isSameDate(t,e){return e===null?!1:new Date(t.toDateString()).valueOf()===new Date(e.toDateString()).valueOf()},isToday(t){return this.isSameDate(t,new Date)},isPast(t){return new Date(t.toDateString()).valueOf()<new Date(new Date().toDateString()).valueOf()},isOption(t){return this.getOptionsForDate(t).length>0},isSelectedDate(t){return this.isSameDate(t,this.selectedDate)},selectDate(t){this.selectedDate=t},get selectedDateLabel(){return this.selectedDate.toLocaleDateString(this.locale,{weekday:"long",month:"long",day:"numeric"})},getOptionsForDate(t){return this.options.filter(e=>this.isSameDate(t,e.start))},get optionsForSelectedDate(){return this.getOptionsForDate(this.selectDate)},getOptionLabel(t){return t.start.toLocaleTimeString(this.locale,{hour:"2-digit",minute:"2-digit"})},isSelectedOption(t){return t===this.selectedOption},setState(t){this.state=[t.start,t.end]}}))});})();
