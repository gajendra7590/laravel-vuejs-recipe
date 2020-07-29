import Vue from 'vue';
import VueRouter from 'vue-router';
import App from './frontend/components/App.vue';

//Router
import router from './frontend/router';

require('./bootstrap');
export default new Vue({
    el: '#app',
    router: router,
    render: h => h(
        App
    ),

});