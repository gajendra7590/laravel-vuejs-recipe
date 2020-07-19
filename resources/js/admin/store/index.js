import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";
import config from '../../config';
Vue.use(axios);



axios.interceptors.response.use(function(response) {
    return response;
}, function(err) {
    if ((typeof(err.response) !== 'undefined')) {
        if ((typeof(err.response.status) !== 'undefined') && (err.response.status == 401) && err.response.data.message == 'Unauthenticated.') {
            localStorage.removeItem('token');
            alert('Your session has been expired please login again..');
            window.location.href = '/login';
        } else if ((typeof(err.response.status) !== 'undefined') && (err.response.status == 403) && err.response.data.message == 'User does not have the right roles.') {
            // alert('Your have no permission to access this section');
            //window.location.href = '/admin/home';

            console.log(VueToastr)
        } else {
            alert('something went wrong..')
        }
    }
});



//All Mutations
import * as commosMutations from "./mutations/commonMutations";
const mutations = Object.assign({}, commosMutations.default);

//All Actions
import * as commonActions from "./actions/commonActions";
const actions = Object.assign({}, commonActions.default);

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        baseURL: config.BASE_URL,
        ASSET_BURL: config.BASE_URL,
        data: {
            ListResult: [],
            EditData: [],
            getAll: []
        }
    },
    mutations,
    actions
});

export default store;