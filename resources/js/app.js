import Vue from 'vue';
import VueRouter from 'vue-router';
import VueToastr from "vue-toastr";
import VueLazyload from "vue-lazyload";
import CKEditor from '@ckeditor/ckeditor5-vue';
import VueMoment from 'vue-moment';
import moment from 'moment-timezone';
import $ from 'jquery';
require('./bootstrap');

//Impoer Custom
import App from './frontend/components/App.vue';
import router from './frontend/router';
import store from './frontend/store/index';

import config from './config';

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


export default new Vue({
    el: '#app',
    store: store,
    router: router,
    render: h => h(
        App
    ),

});