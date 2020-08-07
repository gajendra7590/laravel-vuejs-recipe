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
    //Dasboard Get Data
    getDashboardData({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios
                .get(config.API_URL_ADMIN + "getDashboardData")
                .then(function(response) {
                    return resolve(response.data);
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    //All Functions For clients Section
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

    //All Functions For Author Section
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
    //All Functions for Recipe Category Section
    categories({ commit, state }, payload) {
        axios
            .get(config.API_URL_ADMIN + "categories", payload)
            .then(function(response) {
                commit("categories", response.data);
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
    },
    //All Functions for Recipe tags Section
    tags({ commit, state }, payload) {
        axios
            .get(config.API_URL_ADMIN + "tags", payload)
            .then(function(response) {
                commit("tags", response.data);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
    getTags({ commit, state }, payload) {
        axios
            .get(config.API_URL_ADMIN + "getTags", payload)
            .then(function(response) {
                commit("getTags", response.data);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
    editTags({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios
                .get(config.API_URL_ADMIN + "getTag/" + payload.id)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    createTag({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Content-Type'] = `multipart/form-data`;
            axios
                .post(config.API_URL_ADMIN + "createTag", payload.data)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    updateTag({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Content-Type'] = `multipart/form-data`;
            axios
                .post(config.API_URL_ADMIN + "updateTag/" + payload.id, payload.data)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    deleteTag({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios
                .delete(config.API_URL_ADMIN + "deleteTag/" + payload.id)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    //All Functions For Recipes Section
    getRecipes({ commit, state }, payload) {
        axios
            .get(config.API_URL_ADMIN + "getRecipes", payload)
            .then(function(response) {
                commit("getRecipes", response.data);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
    editRecipes({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios
                .get(config.API_URL_ADMIN + "editRecipes/" + payload.id)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    createRecipes({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Content-Type'] = `multipart/form-data`;
            axios
                .post(config.API_URL_ADMIN + "createRecipes", payload.data)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    updateRecipes({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Content-Type'] = `multipart/form-data`;
            axios
                .post(config.API_URL_ADMIN + "updateRecipes/" + payload.id, payload.data)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    deleteRecipes({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios
                .delete(config.API_URL_ADMIN + "deleteRecipes/" + payload.id)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },

    //All Functions for Profile Section
    changePassword({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios
                .post(config.API_URL_ADMIN + "changePassword", payload.data)
                .then(function(response) {
                    return resolve(response.data);
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    updateProfile({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios
                .post(config.API_URL_ADMIN + "updateProfile", payload.data)
                .then(function(response) {
                    return resolve(response.data);
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    getProfile({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios
                .get(config.API_URL_ADMIN + "getProfile")
                .then(function(response) {
                    return resolve(response.data);
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    loggedProfile({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios
                .get(config.API_URL_ADMIN + "loggedProfile")
                .then(function(response) {
                    return resolve(response.data);
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    }


};