require('./bootstrap');

window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('youtup-dashboard', require('./Youtup/YoutupDash.vue').default);


window.eventBus = new Vue({});


const app = new Vue({
    el: '#app',
});
