import Vue from 'vue';
Vue.config.productionTip = false;
import $ from 'jquery';
import config from './config';
import VueRouter from 'vue-router';
import VueToastr from "vue-toastr";
import VueLazyload from "vue-lazyload";
import CKEditor from '@ckeditor/ckeditor5-vue';
import VueMoment from 'vue-moment';
import moment from 'moment-timezone';
import Paginate from 'vuejs-paginate';
import VueSocialSharing from 'vue-social-sharing';
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
require('./bootstrap');
//Impoer Custom
import App from './frontend/components/App.vue';
import Rating from './frontend/components/shared/Rating.vue';
Vue.component('Rating', Rating);
import router from './frontend/router';
import store from './frontend/store/index';

//Vee Valdiate Client & Server Side Validation
import { ValidationProvider, ValidationObserver, extend } from 'vee-validate';
import * as rules from 'vee-validate/dist/rules';
import { messages } from 'vee-validate/dist/locale/en.json';
// install rules and localization 
Object.keys(rules).forEach(rule => {
    extend(rule, {
        ...rules[rule], // copies rule configuration
        message: messages[rule] // assign message
    });
});
// Install components globally
Vue.component('ValidationObserver', ValidationObserver);
Vue.component('ValidationProvider', ValidationProvider);

//Datatable
import { ServerTable, ClientTable, Event } from 'vue-tables-2';
Vue.use(ClientTable);

//Confirm dialog 
import VuejsDialog from 'vuejs-dialog';
import VuejsDialogMixin from 'vuejs-dialog/dist/vuejs-dialog-mixin.min.js';
import 'vuejs-dialog/dist/vuejs-dialog.min.css';
Vue.use(VuejsDialog);

Vue.use(VueLazyload, {
    preLoad: 1,
    error: config.BASE_URL + "default_img/default.jpg",
    //loading: config.BASE_URL + "default_img/lazy_default.gif",
    loading: config.BASE_URL + "default_img/loader.gif",
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
Vue.component('paginate', Paginate);
Vue.use(VueSocialSharing);
Vue.use(Loading, {
    color: 'blue',
    backgroundColor: '#000000',
    height: 50,
    width: 50,
    transition: 'slide-fade',
    opacity: 0.9
});


export default new Vue({
    el: '#app',
    store: store,
    router: router,
    render: h => h(
        App
    ),

});