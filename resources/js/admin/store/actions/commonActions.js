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
    getClients({ commit, state }, payload) {
        axios
            .get(config.API_URL_ADMIN + "getClients", payload)
            .then(function(response) {
                commit("getClients", response.data);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
    editClients({ commit, state }, client_id) {
        axios
            .get(config.API_URL_ADMIN + "/editClients/" + client_id)
            .then(function(response) {
                commit("editClients", response.data);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
    getAuthors({ commit, state }, payload) {
        axios
            .get(config.API_URL_ADMIN + "getAuthors", payload)
            .then(function(response) {
                commit("getAuthors", response.data);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
    editAuthors({ commit, state }, author_id) {
        axios
            .get(config.API_URL_ADMIN + "editAuthors/" + author_id)
            .then(function(response) {
                commit("editAuthors", response.data);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
    getCategories({ commit, state }, payload) {
        axios
            .get(config.API_URL_ADMIN + "getCategories", payload)
            .then(function(response) {
                commit("getCategories", response.data);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
    editCategories({ commit, state }, category_id) {
        axios
            .get(config.API_URL_ADMIN + "getCategory/" + category_id)
            .then(function(response) {
                commit("editCategories", response.data);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
    getClients({ commit, state }, payload) {
        axios
            .get(config.API_URL_ADMIN + "getClients", payload)
            .then(function(response) {
                commit("getClients", response.data);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
    editClients({ commit, state }, client_id) {
        axios
            .get(config.API_URL_ADMIN + "editClients/" + client_id)
            .then(function(response) {
                commit("editClients", response.data);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
    getAuthors({ commit, state }, payload) {
        axios
            .get(config.API_URL_ADMIN + "getAuthors", payload)
            .then(function(response) {
                commit("getAuthors", response.data);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
    editAuthors({ commit, state }, author_id) {
        axios
            .get(config.API_URL_ADMIN + "editAuthors/" + author_id)
            .then(function(response) {
                commit("editClients", response.data);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
};