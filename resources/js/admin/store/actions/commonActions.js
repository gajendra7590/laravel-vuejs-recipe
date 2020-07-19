import Vue from "vue";
import axios from "axios";
Vue.use(axios);
import config from "../../../config";

//Set Axios header
axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
export default {
    adminLogin({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios
                .post(config.API_URL_ADMIN + "login", payload)
                .then(function(response) {
                    return resolve(response.data);
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    adminForgotPassword({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios
                .post(config.API_URL_ADMIN + "forgot-password", payload)
                .then(function(response) {
                    return resolve(response.data);
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    adminLogout({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios
                .post(config.API_URL_ADMIN + "logout", payload)
                .then(function(response) {
                    return resolve(response.data);
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    getRiverPageArts({ commit, state }, payload) {
        axios
            .get(config.API_URL + "riverPageArts?category=" + payload)
            .then(function(response) {
                commit("getRiverPageArts", response);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    }
};