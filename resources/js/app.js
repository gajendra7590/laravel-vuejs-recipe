import Vue from 'vue';
import VueRouter from 'vue-router';
import App from './frontend/components/App.vue';

//Router
import router from './frontend/router';

//Store
import store from './frontend/store/index'

require('./bootstrap');
export default new Vue({
    el: '#app',
    store: store,
    router: router,
    render: h => h(
        App
    ),

});