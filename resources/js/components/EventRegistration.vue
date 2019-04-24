<template>
    <button class="btn" v-bind:class="buttonMode" v-on:click="handleRegistration">{{buttonText}}</button>
</template>

<script>
    import {registrationUrl} from "../config";

    export default {
        props: ['text', 'mode', 'eventId'],
        created() {
           this.buttonText = this.text;
           this.buttonMode = this.mode;
        },
        data() {
            return {
              buttonText: '',
              buttonMode: ''
            }
        },
        methods: {
            handleRegistration() {
                let postData = {
                    eventId: this.eventId
                };
                axios.post(registrationUrl, postData).then(res => {
                    if(res.status === 201) {
                        this.buttonText = 'De-Register';
                        this.buttonMode = 'btn-warning';
                    }
                    if(res.status === 200) {
                        this.buttonText = 'Register';
                        this.buttonMode = 'btn-success';
                    }
                })
            }
        }
    }
</script>