import Vue from "vue";
import axios from "axios";
Vue.use(axios);

import config from "../../../config";

export default {
    //Home Start
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
    //Home End
    //Common Start
    followOnInstagram({ commit, state }, payload) {
        axios
            .get(config.API_URL + "followOnInstagram?limit=" + ((payload) ? payload : 8))
            .then(function(response) {
                commit("followOnInstagram", response.data);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
    latestsRecipes({ commit, state }, payload) {
        axios
            .get(config.API_URL + "latestsRecipes?limit=" + ((payload) ? payload : 3))
            .then(function(response) {
                commit("latestsRecipes", response.data);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
    featuredRecipes({ commit, state }, payload) {
        axios
            .get(config.API_URL + "featuredRecipes?limit=" + ((payload) ? payload : 3))
            .then(function(response) {
                commit("featuredRecipes", response.data);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
    randomRecipes({ commit, state }, payload) {
        axios
            .get(config.API_URL + "randomRecipes?limit=" + ((payload) ? payload : 3))
            .then(function(response) {
                commit("randomRecipes", response.data);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
    popularTags({ commit, state }, payload) {
        axios
            .get(config.API_URL + "popularTags?limit=" + ((payload) ? payload : 3))
            .then(function(response) {
                commit("popularTags", response.data);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
    getSidebarCategories({ commit, state }, payload) {
        axios
            .get(config.API_URL + "getSidebarCategories?limit=" + ((payload) ? payload : 3))
            .then(function(response) {
                commit("getSidebarCategories", response.data);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
    //Common End
    //Category Start
    getCategories({ commit, state }, payload) {
        axios
            .get(config.API_URL + "getCategories")
            .then(function(response) {
                commit("categoriesList", response.data);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
    //Category End
    //Authors Start
    authorsList({ commit, state }, payload) {
        axios
            .get(config.API_URL + "authorsList")
            .then(function(response) {
                commit("authorsList", response.data);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
    authorsDetail({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios
                .get(config.API_URL + "authorsDetail/" + payload.id)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    authorsRecipe({ commit, state }, payload) {
        axios
            .get(config.API_URL + "authorsRecipe/" + payload.id)
            .then(function(response) {
                commit("authorsRecipe", response.data);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
    //Authors End
    //Recipes Start
    recipesList({ commit, state }, payload) {
        axios
            .get(config.API_URL + "recipesList")
            .then(function(response) {
                commit("recipesList", response.data);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
    recipesListByCategory({ commit, state }, payload) {
        axios
            .get(config.API_URL + "recipesListByCategory/" + payload.slug, payload)
            .then(function(response) {
                commit("recipesListByCategory", response.data);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
    recipesListByTag({ commit, state }, payload) {
        axios
            .get(config.API_URL + "recipesListByTag/" + payload.slug, payload)
            .then(function(response) {
                commit("recipesListByTag", response.data);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
    //Recipes End
    //Recipe Detail Start
    recipeDetail({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios
                .get(config.API_URL + "recipeDetail/" + payload.slug)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    //Recipe Detail End
};