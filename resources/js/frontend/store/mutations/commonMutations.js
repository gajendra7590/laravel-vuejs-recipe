export default {
    getHomeSlider(state, data) {
        console.log(state, data);
        state.data.getHomeSlider = data;
    },
    homeTrendingRecipe(state, data) {
        console.log(state, data);
        state.data.homeTrendingRecipe = data;
    },
    homeSection3In1(state, data) {
        console.log(state, data);
        state.data.homeSection3In1 = data;
    },
    homeSidebarSection3In1(state, data) {
        console.log(state, data);
        state.data.homeSidebarSection3In1 = data;
    },
    followOnInstagram(state, data) {
        console.log(state, data);
        state.data.followOnInstagram = data;
    },


};