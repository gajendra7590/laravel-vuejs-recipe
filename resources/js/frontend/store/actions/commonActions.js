import Vue from "vue";
import axios from "axios";
Vue.use(axios);

import config from "../../../config";

export default {
    // River
    getRiverPageArts({ commit, state }, payload) {
        axios
            .get(config.API_URL + "riverPageArts?category=" + payload)
            .then(function (response) {
                commit("getRiverPageArts", response);
            })
            .catch(function (error) {
                console.log(error.response);
            });
    },
    // Header
    getCategories({ commit, state }, payload) {
        axios
            .get(config.API_URL + "categories")
            .then(function (response) {
                commit("getCategories", response);
            })
            .catch(function (error) {
                console.log(error.response);
            });
    },
    getCountry({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .get(config.API_URL + "getCountries", payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return reject(error.response);
                });
        });
    },
    // Home
    getTop5Arts({ commit, state }, payload) {
        axios
            .get(config.API_URL + "homeGetTop5Arts")
            .then(function (response) {
                commit("getTop5Arts", response);
            })
            .catch(function (error) {
                console.log(error.response);
            });
    },
    getCategoriesWithSubCatComma({ commit, state }, payload) {
        axios
            .get(config.API_URL + "homeGetCategoriesWithSubCatComma")
            .then(function (response) {
                commit("getCategoriesWithSubCatComma", response);
            })
            .catch(function (error) {
                console.log(error.response);
            });
    },
    getHomeFeaturedArtist({ commit, state }, payload) {
        // return new Promise(function (resolve, reject) {
        //     axios
        //         .get(config.API_URL + "homeFeaturedArtist", payload)
        //         .then(function (response) {
        //             return resolve(response.data);
        //         })
        //         .catch(function (error) {
        //             return reject(error.response);
        //         });
        // });
        axios
            .get(config.API_URL + "homeFeaturedArtist")
            .then(function (response) {
                commit("getHomeFeaturedArtist", response);
            })
            .catch(function (error) {
                console.log(error.response);
            });
    },
    getClientFeedback({ commit, state }, payload) {
        axios
            .get(config.API_URL + "clientsFeedback")
            .then(function (response) {
                commit("getClientFeedback", response);
            })
            .catch(function (error) {
                console.log(error.response);
            });
    },
    // Artist detail
    getArtistDetail({ commit, state }, payload) {
        axios
            .get(config.API_URL + "artists/" + payload)
            .then(function (response) {
                commit("getArtistDetail", response);
            })
            .catch(function (error) {
                console.log(error.response);
            });
    },
    getArtsByArtist({ commit, state }, payload) {
        axios
            .get(config.API_URL + "arts_by_artist/" + payload)
            .then(function (response) {
                commit("getArtsByArtist", response);
            })
            .catch(function (error) {
                console.log(error.response);
            });
    },
    getArtistFollowers({ commit, state }, payload) {
        axios
            .get(config.API_URL + "getArtistFollowers/" + payload)
            .then(function (response) {
                commit("getArtistFollowers", response);
            })
            .catch(function (error) {
                console.log(error.response);
            });
    },
    getArtsByArtistNine({ commit, state }, payload) {
        axios
            .get(config.API_URL + "arts_by_artist_nine/" + payload)
            .then(function (response) {
                commit("getArtsByArtistNine", response);
            })
            .catch(function (error) {
                console.log(error.response);
            });
    },
    // Plan detail
    getPlanDetail({ commit, state }, payload) {
        axios
            .get(config.API_URL + "getPlans")
            .then(function (response) {
                commit("getPlanDetail", response);
            })
            .catch(function (error) {
                console.log(error.response);
            });
    },
    // Detail page categories
    getCategoriesDetail({ commit, state }, payload) {
        axios
            .get(config.API_URL + "categories/" + payload)
            .then(function (response) {
                commit("getCategoriesDetail", response);
            })
            .catch(function (error) {
                console.log(error.response);
            });
    },
    getSubCategories({ commit, state }, payload) {
        axios
            .get(config.API_URL + "sub-categories/" + payload)
            .then(function (response) {
                commit("getSubCategories", response);
            })
            .catch(function (error) {
                console.log(error.response);
            });
    },
    getfilterDataCategories({ commit, state }, payload) {
        axios
            .get(
                config.API_URL +
                "getArtsByCategory/" +
                payload.id +
                "?subcat=" +
                payload.sub
            )
            .then(function (response) {
                commit("getfilterDataCategories", response);
            })
            .catch(function (error) {
                console.log(error.response);
            });
    },
    // Get single product
    getSingleProductDetails({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .get(config.API_URL + "arts/" + payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return reject(error.response);
                });
        });
    },
    logout({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .get(config.API_URL + "logout")
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return reject(error.response);
                });
        });
    },
    getAccountDetail({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .get(config.API_URL + "fan/getAccountDetail")
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return reject(error.response);
                });
        });
    },
    createPlanSubscribtion({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .post(config.API_URL + "fan/subscriptionPayDone", payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return reject(error.response);
                });
        });
    },
    createPlanSubscribtionNoAuth({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .post(config.API_URL + "fan/subscriptionNoAuth", payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return reject(error.response);
                });
        });
    },
    verifyAccount({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .post(config.API_URL + "verifyAccount", payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return reject(error.response);
                });
        });
    },
    resetPassword({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .post(config.API_URL + "resetPassword", payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return reject(error.response);
                });
        });
    },
    updateAccountDetail({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .post(config.API_URL + "fan/saveAccountDetail", payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return reject(error.response);
                });
        });
    },
    selectState({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .get(config.API_URL + "getStates/" + payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return reject(error.response);
                });
        });
    },
    selectCity({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .get(config.API_URL + "getCities/" + payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return reject(error.response);
                });
        });
    },
    signupFan({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .post(config.API_URL + "signupFan", payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return reject(error.response);
                });
        });
    },
    signupArtist({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .post(config.API_URL + "signupArtist", payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return reject(error.response);
                });
        });
    },
    sendResetPasswordLink({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .post(config.API_URL + "sendResetPasswordLink", payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return reject(error.response);
                });
        });
    },
    resendAccountVerifyLink({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .post(config.API_URL + "resendAccountVerifyLink", payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return reject(error.response);
                });
        });
    },
    getCommentList({ commit, state }, payload) {
        axios.get(
            config.API_URL + "getArtComment/" + payload)
            .then(function (response) {
                commit("getCommentList", response);
            })
            .catch(function (error) {
                console.log(error.response);
            });
        // return new Promise(function (resolve, reject) {
        //     axios
        //         .get(config.API_URL + "getArtComment/" + payload)
        //         .then(function (response) {
        //             return resolve(response.data);
        //         })
        //         .catch(function (error) {
        //             return reject(error.response);
        //         });
        // });
    },
    createComments({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .post(config.API_URL + "submitArtComment/" + payload.id, payload.data)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return reject(error.response);
                });
        });
    },
    getFooterData({ commit, state }, payload) {
        axios
            .get(config.API_URL + "getFooterData", payload)
            .then(function (response) {
                commit("getFooterData", response);
            })
            .catch(function (error) {
                console.log(error.response);
            });
    },
    sentInviteData({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .post(config.API_URL + "fan/inviteFan", payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return reject(error.response);
                });
        });
    },
    downloadData({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .post(config.API_URL + "attemptDownload/" + payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return reject(error.response);
                });
        });
    },
    reportAbuse({ commit, state }, payload) {
        return new Promise(function (resolve, reject) {
            axios
                .post(config.API_URL + "reportAbuse", payload)
                .then(function (response) {
                    return resolve(response.data);
                })
                .catch(function (error) {
                    return reject(error.response);
                });
        });
    },
    getFAQData({ commit, state }, payload) {
        axios
            .get(config.API_URL + "faqsCategories", payload)
            .then(function (response) {
                commit("getFAQData", response);
            })
            .catch(function (error) {
                console.log(error.response);
            });
    },
    getFAQFilterData({ commit, state }, payload) {
        axios
            .get(config.API_URL + "faqsList/" + payload)
            .then(function (response) {
                commit("getFAQFilterData", response);
            })
            .catch(function (error) {
                console.log(error.response);
            });
    },
};
