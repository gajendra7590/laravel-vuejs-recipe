import Vue from "vue";
import axios from "axios";
Vue.use(axios);

import config from "../../../config";

export default {
    // River
    getHomeSlider({ commit, state }, payload) {
        axios
            .get(config.API_URL + "getHomeSlider")
            .then(function(response) {
                commit("getHomeSlider", response.data);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
    homeTrendingRecipe({ commit, state }, payload) {
        axios
            .get(config.API_URL + "homeTrendingRecipe")
            .then(function(response) {
                commit("homeTrendingRecipe", response.data);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
    homeSection3In1({ commit, state }, payload) {
        axios
            .get(config.API_URL + "homeSection3In1")
            .then(function(response) {
                commit("homeSection3In1", response.data);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
    homeSidebarSection3In1({ commit, state }, payload) {
        axios
            .get(config.API_URL + "homeSidebarSection3In1")
            .then(function(response) {
                commit("homeSidebarSection3In1", response.data);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
    followOnInstagram({ commit, state }, payload) {
        axios
            .get(config.API_URL + "followOnInstagram")
            .then(function(response) {
                commit("followOnInstagram", response.data);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
};