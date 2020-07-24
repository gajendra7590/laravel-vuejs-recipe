import Vue from 'vue';
import VueToastr from "vue-toastr";
import VueLazyload from "vue-lazyload";
import CKEditor from '@ckeditor/ckeditor5-vue';
import axios from 'axios';
//Import Router
import router from './admin/router';
//Import Vuex
import store from './admin/store/index'
//Import Config
import config from './config';
//Import Components
import App from './admin/App.vue';
import Auth from './admin/Auth.vue';
//TimeZone
import VueMoment from 'vue-moment';
import moment from 'moment-timezone';
//Datatable
import { ServerTable, ClientTable, Event } from 'vue-tables-2';



require('./bootstrap');

Vue.use(VueLazyload, {
    preLoad: 1,
    error: config.BASE_URL + "images/default/default.jpg",
    loading: config.BASE_URL + "images/default/lazy_default.gif",
    attempt: 1
});
Vue.use(CKEditor);
Vue.use(VueToastr, {
    defaultTimeout: 3000,
    defaultProgressBar: false,
    defaultProgressBarValue: 0,
    defaultType: "success",
});

Vue.use(VueMoment, { moment });

Vue.use(ServerTable);

var path = window.location.pathname;
var authReq = 1;
if ((path == '/admin/login') || (path == '/admin/forgot-password') || (path == '/admin/set-new-password')) {
    authReq = 0;
}

export default new Vue({
    el: '#app',
    router: router,
    store: store,
    render: h => h((authReq == 1) ? App : Auth)
});