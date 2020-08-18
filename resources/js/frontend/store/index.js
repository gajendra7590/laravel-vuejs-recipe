import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";
import $ from 'jquery';
import config from '../../config.js';


axios.interceptors.response.use(
    function(response) {
        return response;
    },
    function(err) {
        if (typeof err.response !== "undefined") {
            if (
                typeof err.response.status !== "undefined" &&
                err.response.status == 401 &&
                err.response.data.message == "Unauthenticated."
            ) {
                localStorage.removeItem("token");
                alert("Your session has been expired please login..");
                window.location.href = config.URL_PREFIX;
            }
        }
    }
);

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
        BASE_URL: config.BASE_URL,
        loggedIn: false,
        userRole: '',
        data: {
            userDetail: [],

            getHomeSlider: [],
            homeTrendingRecipe: [],
            homeSection3In1: [],
            homeSidebarSection3In1: [],

            followOnInstagram: [],
            latestsRecipes: [],
            featuredRecipes: [],
            randomRecipes: [],
            popularTags: [],
            getSidebarCategories: [],

            categoriesList: [],

            authorsList: [],
            authorsDetai: [],
            authorsRecipe: [],

            recipesList: [],
            recipesListByCategory: [],
            recipesListByTag: [],

            getBlogFeatured: [],
            getBlogLatest: [],
            getBlogInstagrams: [],
            getBlogCategories: [],
            getBlogFeatured: [],
            getBlogTags: [],

            getSocialLinks: [],
            companyDetail: {},

            getRecipeRatings: [],
            getBlogRatings: []
        }
    },
    mutations,
    actions
});

export default store;