export default {
    //Home Start
    getHomeSlider(state, data) {
        state.data.getHomeSlider = data;
    },
    homeTrendingRecipe(state, data) {
        state.data.homeTrendingRecipe = data;
    },
    homeSection3In1(state, data) {
        state.data.homeSection3In1 = data;
    },
    homeSidebarSection3In1(state, data) {
        state.data.homeSidebarSection3In1 = data;
    },
    //Home End
    //Common Start
    followOnInstagram(state, data) {
        state.data.followOnInstagram = data;
    },
    latestsRecipes(state, data) {
        state.data.latestsRecipes = data;
    },
    featuredRecipes(state, data) {
        state.data.featuredRecipes = data;
    },
    randomRecipes(state, data) {
        state.data.randomRecipes = data;
    },
    popularTags(state, data) {
        state.data.popularTags = data;
    },
    //Common End
    //Category Start
    categoriesList(state, data) {
        state.data.categoriesList = data;
    },
    //Category End
    //Authors Start
    authorsList(state, data) {
        state.data.authorsList = data;
    },
    //Authors end
    //Recipes Start
    recipesList(state, data) {
        state.data.recipesList = data;
    },
    //Recipes End

};