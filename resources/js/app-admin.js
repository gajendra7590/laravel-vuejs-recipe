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
//Jquery
import $ from 'jquery';

//Confirm dialog 
import VuejsDialog from 'vuejs-dialog';
import VuejsDialogMixin from 'vuejs-dialog/dist/vuejs-dialog-mixin.min.js';
import 'vuejs-dialog/dist/vuejs-dialog.min.css';
//Vue Validate
import Vuelidate from 'vuelidate';
//Loading Overlay
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';


require('./bootstrap');


Vue.use(VueLazyload, {
    preLoad: 1,
    error: config.BASE_URL + "default_img/default.jpg",
    loading: config.BASE_URL + "default_img/lazy_default.gif",
    attempt: 1
});
Vue.use(CKEditor);
Vue.use(VueToastr, {
    defaultTimeout: 3000,
    defaultProgressBar: false,
    defaultProgressBarValue: 0,
    defaultType: "success",
    maxOpened: 1,
});
Vue.use(VueMoment, { moment });
Vue.use(ServerTable);
Vue.use(VuejsDialog);
Vue.use(Vuelidate);
Vue.use(Loading);


var path = window.location.pathname;
var authReq = 1;
if ((path == '/admin/login') || (path == '/admin/forgot-password') || (path == '/admin/set-new-password')) {
    authReq = 0;
}

//Set Dynamic Base URL
config.ASSET_BASE_URL = $("input[name=asset_url]").val();

export default new Vue({
    el: '#app',
    router: router,
    store: store,
    render: h => h((authReq == 1) ? App : Auth)
});