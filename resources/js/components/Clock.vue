<template>
    <div class="clock-wrapper">
        <span class="month-year mr-5">{{ yearMonthString}}</span>
        <span class="date-time">{{dateTimeString}}</span>
    </div>
</template>
<script>
    import moment from 'moment';
    export default {
        data () {
            return {
                yearMonthString: '',
                dateTimeString: ''
            }
        },
        created() {
            this.yearMonthString = moment().format('MMMM YYYY');
            setInterval(() => {
                this.dateTimeString = moment().format('ddd hh:mm:ss A');
            }, 1000);
        }
    }
</script>