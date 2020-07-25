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
    editClients({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios
                .get(config.API_URL_ADMIN + "editClients/" + payload.id)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    createClients({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Content-Type'] = `multipart/form-data`;
            axios
                .post(config.API_URL_ADMIN + "createClients", payload.data)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    updateClients({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Content-Type'] = `multipart/form-data`;
            axios
                .post(config.API_URL_ADMIN + "updateClients/" + payload.id, payload.data)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    deleteClients({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios
                .delete(config.API_URL_ADMIN + "deleteClients/" + payload.id)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
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
    editAuthors({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios
                .get(config.API_URL_ADMIN + "editAuthors/" + payload.id)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    createAuthors({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Content-Type'] = `multipart/form-data`;
            axios
                .post(config.API_URL_ADMIN + "createAuthors", payload.data)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    updateAuthors({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Content-Type'] = `multipart/form-data`;
            axios
                .post(config.API_URL_ADMIN + "updateAuthors/" + payload.id, payload.data)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    deleteAuthors({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios
                .delete(config.API_URL_ADMIN + "deleteAuthors/" + payload.id)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
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
    editCategories({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios
                .get(config.API_URL_ADMIN + "getCategory/" + payload.id)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    createCategory({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Content-Type'] = `multipart/form-data`;
            axios
                .post(config.API_URL_ADMIN + "createCategory", payload.data)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    updateCategory({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Content-Type'] = `multipart/form-data`;
            axios
                .post(config.API_URL_ADMIN + "updateCategory/" + payload.id, payload.data)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    deleteCategory({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios
                .delete(config.API_URL_ADMIN + "deleteCategory/" + payload.id)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    }
};