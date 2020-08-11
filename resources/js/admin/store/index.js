import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";
import $ from 'jquery';
import config from '../../config';
//Vue.use(axios);
// axios.interceptors.response.use(function(response) {
//     return response;
// }, function(err) {
//     alert('axios')
//     if ((typeof(err.response) !== 'undefined')) {
//         if ((typeof(err.response.status) !== 'undefined') && (err.response.status == 401) && err.response.data.message == 'Unauthenticated.') {
//             localStorage.removeItem('token');
//             alert('Your session has been expired please login again..');
//             window.location.href = '/login';
//         } else if ((typeof(err.response.status) !== 'undefined') && (err.response.status == 403) && err.response.data.message == 'User does not have the right roles.') {

//         } else {
//             alert('something went wrong..')
//         }
//     }
// });

//All Mutations
import * as commosMutations from "./mutations/commonMutations";
const mutations = Object.assign({}, commosMutations.default);

//All Actions
import * as commonActions from "./actions/commonActions";
const actions = Object.assign({}, commonActions.default);

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        ASSET_BASE_URL: $('input[name="asset_url"]').val(),
        data: {
            //Clients
            getClients: [],
            editClients: [],
            //Authors
            getAuthors: [],
            editAuthors: [],
            //Recipes 
            recipeList: [],
            editRecipe: [],
            //Recipe Categories
            categories: [],
            getCategories: [],
            editCategories: [],
            //Recipes Tags
            getTags: [],
            editTags: [],
            tags: [],
            //Blogs 
            getBlogs: [],
            editBlog: [],
            //Blog Categories
            blogCategories: [],
            getBlogCategories: [],
            //Blog Tags
            getBlogTags: [],
            editBlogTags: [],
            blogTags: [],
            //User Profile 
            userProfile: [],
            //Dashboard
            dashboardData: []
        }
    },
    mutations,
    actions
});

export default store;