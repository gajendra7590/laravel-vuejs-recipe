import Vue from 'vue';

//Import Router
import router from './admin/router';
//Import Vuex


//Import Components
import App from './admin/App.vue';
import Auth from './admin/Auth.vue';

require('./bootstrap');


var path = window.location.pathname;
var authReq = 1;
if ((path == '/admin/login') || (path == '/admin/forgot-password') || (path == '/admin/set-new-password')) {
    authReq = 0;
}


export default new Vue({
    el: '#app',
    router: router,
    render: h => h((authReq == 1) ? App : Auth)
});