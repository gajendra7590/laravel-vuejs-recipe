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
require('./bootstrap');
//Impoer Custom
import App from './frontend/components/App.vue';
import router from './frontend/router';
import store from './frontend/store/index';



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

export default new Vue({
    el: '#app',
    store: store,
    router: router,
    render: h => h(
        App
    ),

});