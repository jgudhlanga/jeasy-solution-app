
require('./bootstrap');
import * as VueGoogleMaps from 'vue2-google-maps'
window.Vue = require('vue');

Vue.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyC8Xblwa8atvrleSzwyF1XNFsycIsuHe1c',
        libraries: 'places',
    },
});

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('event-location', require('./components/EventLocation.vue').default);
Vue.component('event-registration', require('./components/EventRegistration.vue').default);
Vue.component('clock', require('./components/Clock.vue').default);


const app = new Vue({
    el: '#app'
});
