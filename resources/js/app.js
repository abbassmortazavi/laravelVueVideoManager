require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import YoutupDash from './Youtup/YoutupDash';
import VideoDtails from './Youtup/VideoDtails';

Vue.use(VueRouter);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('youtup-dashboard', require('./Youtup/YoutupDash.vue').default);


window.eventBus = new Vue({});

const routes = [
    {
        path: '/',
        name: 'youtub-dash',
        component: YoutupDash
    },
    {
        path:'/video/:id',
        name: 'youtub-video',
        component: VideoDtails
    }
];

const router = new VueRouter({
    routes
});

const app = new Vue({
    el: '#app',
    router
});
