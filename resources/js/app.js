import Vue from 'vue';
import VueRouter from 'vue-router';

import AppComponent from './components/AppComponent.vue'

require('./bootstrap');


// Vue Router Start Here 
Vue.use(VueRouter);
import Home from './components/without_login/Home.vue';
import About from './components/without_login/About.vue';
const router = new VueRouter({
    'mode': 'history',
    routes: [{
            path: '/',
            component: Home,
            name: 'home',
        },
        {
            path: '/about',
            component: About,
            name: 'about',
        }
    ]
});



export default new Vue({
    el: '#app',
    router: router,
    render: h => h(
        AppComponent
    ),

});