import Vue from "vue";
import axios from "axios";
//Vue.use(axios); 
import config from "../../../config";

let userData = localStorage.getItem('USER_SESSION');
let token = null;
if (!!userData) {
    try {
        userData = JSON.parse(userData);
        token = (typeof(userData.token) != 'undefined') ? userData.token : null;
    } catch (e) {
        localStorage.removeItem('USER_SESSION');
    }
}
axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
export default {
    //Auth Section Start
    login({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Content-Type'] = `multipart/form-data`;
            axios
                .post(config.API_URL + "login", payload)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error);
                });
        });
    },
    register({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Content-Type'] = `multipart/form-data`;
            axios
                .post(config.API_URL + "register", payload)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error);
                });
        });
    },
    forgotPassword({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Content-Type'] = `multipart/form-data`;
            axios
                .post(config.API_URL + "forgot-password", payload)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error);
                });
        });
    },
    forgotPasswordSave({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Content-Type'] = `multipart/form-data`;
            axios
                .post(config.API_URL + "forgot-password-save", payload)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error);
                });
        });
    },
    verifyToken({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Content-Type'] = `multipart/form-data`;
            axios
                .post(config.API_URL + "verify-token", payload)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error);
                });
        });
    },
    signout({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Content-Type'] = `multipart/form-data`;
            axios
                .post(config.API_URL + "signout", payload)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error);
                });
        });
    },
    signoutAll({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Content-Type'] = `multipart/form-data`;
            axios
                .post(config.API_URL + "signoutAll", payload)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error);
                });
        });
    },
    //Auth Section End
    //Extra Routes For Blog & Recipe Start
    saveContactUsEnquiry({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Content-Type'] = `multipart/form-data`;
            axios
                .post(config.API_URL + "saveContactUsEnquiry", payload)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error);
                });
        });
    },
    getRecipeRatings({ commit, state }, payload) {
        axios
            .get(config.API_URL + "getRecipeRatings/" + payload.id)
            .then(function(response) {
                commit("getRecipeRatings", response.data);
            })
            .catch(function(error) {
                console.log(error);
            });
    },
    createNewRecipeRating({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Content-Type'] = `multipart/form-data`;
            axios
                .post(config.API_URL + "createNewRecipeRating/" + payload.id, payload)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error);
                });
        });
    },
    createNewRecipeLike({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Content-Type'] = `multipart/form-data`;
            axios
                .post(config.API_URL + "createNewRecipeLike/" + payload.id, payload)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error);
                });
        });
    },
    createNewRecipeView({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Content-Type'] = `multipart/form-data`;
            axios
                .post(config.API_URL + "createNewRecipeView/" + payload.id, payload)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error);
                });
        });
    },
    getBlogRatings({ commit, state }, payload) {
        axios
            .get(config.API_URL + "getBlogRatings/" + payload.id)
            .then(function(response) {
                commit("getBlogRatings", response.data);
            })
            .catch(function(error) {
                console.log(error);
            });
    },
    createNewBlogRating({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Content-Type'] = `multipart/form-data`;
            axios
                .post(config.API_URL + "createNewBlogRating/" + payload.id, payload)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error);
                });
        });
    },
    createNewBlogLike({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Content-Type'] = `multipart/form-data`;
            axios
                .post(config.API_URL + "createNewBlogLike/" + payload.id, payload)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error);
                });
        });
    },
    createNewBlogView({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Content-Type'] = `multipart/form-data`;
            axios
                .post(config.API_URL + "createNewBlogView/" + payload.id, payload)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error);
                });
        });
    },
    //Extra Routes For Blog & Recipe Start
    //Home Start
    getHomeSlider({ commit, state }, payload) {
        axios
            .get(config.API_URL + "getHomeSlider")
            .then(function(response) {
                commit("getHomeSlider", response.data);
            })
            .catch(function(error) {
                console.log(error);
            });
    },
    homeTrendingRecipe({ commit, state }, payload) {
        axios
            .get(config.API_URL + "homeTrendingRecipe")
            .then(function(response) {
                commit("homeTrendingRecipe", response.data);
            })
            .catch(function(error) {
                console.log(error);
            });
    },
    homeSection3In1({ commit, state }, payload) {
        axios
            .get(config.API_URL + "homeSection3In1")
            .then(function(response) {
                commit("homeSection3In1", response.data);
            })
            .catch(function(error) {
                console.log(error);
            });
    },
    homeSidebarSection3In1({ commit, state }, payload) {
        axios
            .get(config.API_URL + "homeSidebarSection3In1")
            .then(function(response) {
                commit("homeSidebarSection3In1", response.data);
            })
            .catch(function(error) {
                console.log(error);
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
                console.log(error);
            });
    },
    latestsRecipes({ commit, state }, payload) {
        axios
            .get(config.API_URL + "latestsRecipes?limit=" + ((payload) ? payload : 3))
            .then(function(response) {
                commit("latestsRecipes", response.data);
            })
            .catch(function(error) {
                console.log(error);
            });
    },
    featuredRecipes({ commit, state }, payload) {
        axios
            .get(config.API_URL + "featuredRecipes?limit=" + ((payload) ? payload : 3))
            .then(function(response) {
                commit("featuredRecipes", response.data);
            })
            .catch(function(error) {
                console.log(error);
            });
    },
    randomRecipes({ commit, state }, payload) {
        axios
            .get(config.API_URL + "randomRecipes?limit=" + ((payload) ? payload : 3))
            .then(function(response) {
                commit("randomRecipes", response.data);
            })
            .catch(function(error) {
                console.log(error);
            });
    },
    popularTags({ commit, state }, payload) {
        axios
            .get(config.API_URL + "popularTags?limit=" + ((payload) ? payload : 3))
            .then(function(response) {
                commit("popularTags", response.data);
            })
            .catch(function(error) {
                console.log(error);
            });
    },
    getSidebarCategories({ commit, state }, payload) {
        axios
            .get(config.API_URL + "getSidebarCategories?limit=" + ((payload) ? payload : 3))
            .then(function(response) {
                commit("getSidebarCategories", response.data);
            })
            .catch(function(error) {
                console.log(error);
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
                console.log(error);
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
                console.log(error);
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
                    return reject(error);
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
                console.log(error);
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
                console.log(error);
            });
    },
    recipesListByCategory({ commit, state }, payload) {
        axios
            .get(config.API_URL + "recipesListByCategory/" + payload.slug, payload)
            .then(function(response) {
                commit("recipesListByCategory", response.data);
            })
            .catch(function(error) {
                console.log(error);
            });
    },
    recipesListByTag({ commit, state }, payload) {
        axios
            .get(config.API_URL + "recipesListByTag/" + payload.slug, payload)
            .then(function(response) {
                commit("recipesListByTag", response.data);
            })
            .catch(function(error) {
                console.log(error);
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
                    return reject(error);
                });
        });
    },
    //Recipe Detail End
    //Blogs All functions start
    getBlogList({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios
                .get(config.API_URL + "getBlogList?page=" + payload.page)
                .then(function(response) {
                    return resolve(response.data);
                })
                .catch(function(error) {
                    return reject(error);
                });
        });
    },
    getBlogListByTags({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios
                .get(config.API_URL + "getBlogListByTags/" + payload.slug + "?page=" + payload.page)
                .then(function(response) {
                    return resolve(response.data);
                })
                .catch(function(error) {
                    return reject(error);
                });
        });
    },
    getBlogListByCategories({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios
                .get(config.API_URL + "getBlogListByCategories/" + payload.slug + "?page=" + payload.page)
                .then(function(response) {
                    return resolve(response.data);
                })
                .catch(function(error) {
                    return reject(error);
                });
        });
    },
    getBlogDetail({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios
                .get(config.API_URL + "getBlogDetail/" + payload.slug)
                .then(function(response) {
                    return resolve(response.data);
                })
                .catch(function(error) {
                    return reject(error);
                });
        });
    },
    getBlogFeatured({ commit, state }, payload) {
        axios
            .get(config.API_URL + "getBlogFeatured?limit=" + payload.limit)
            .then(function(response) {
                commit("getBlogFeatured", response.data);
            })
            .catch(function(error) {
                console.log(error);
            });
    },
    getBlogLatest({ commit, state }, payload) {
        axios
            .get(config.API_URL + "getBlogLatest?limit=" + payload.limit)
            .then(function(response) {
                commit("getBlogLatest", response.data);
            })
            .catch(function(error) {
                console.log(error);
            });
    },
    getBlogInstagrams({ commit, state }, payload) {
        axios
            .get(config.API_URL + "getBlogInstagrams?limit=" + payload.limit)
            .then(function(response) {
                commit("getBlogInstagrams", response.data);
            })
            .catch(function(error) {
                console.log(error);
            });
    },
    getBlogCategories({ commit, state }, payload) {
        axios
            .get(config.API_URL + "getBlogCategories?limit=" + payload.limit)
            .then(function(response) {
                commit("getBlogCategories", response.data);
            })
            .catch(function(error) {
                console.log(error);
            });
    },
    getBlogTags({ commit, state }, payload) {
        axios
            .get(config.API_URL + "getBlogTags?limit=" + payload.limit)
            .then(function(response) {
                commit("getBlogTags", response.data);
            })
            .catch(function(error) {
                console.log(error);
            });
    },
    //Blogs All functions end
    //Company Detail All functions Start
    getSocialLinks({ commit, state }, payload) {
        axios
            .get(config.API_URL + "getSocialLinks")
            .then(function(response) {
                commit("getSocialLinks", response.data);
            })
            .catch(function(error) {
                console.log(error);
            });
    },
    companyDetail({ commit, state }, payload) {
        axios
            .get(config.API_URL + "companyDetail")
            .then(function(response) {
                commit("companyDetail", response.data);
            })
            .catch(function(error) {
                console.log(error);
            });
    },
    //Company Detail All functions End
};