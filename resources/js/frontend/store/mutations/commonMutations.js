export default {
    // River
    getRiverPageArts(state, data) {
        console.log(state, data);
        state.data.riverArts = data;
    },
    // head
    getCategories(state, data) {
        state.data.categoriesList = data;
    },
    // getCountry(state, data) {
    //     state.data.countryList = data;
    // },
    // home
    getTop5Arts(state, data) {
        state.data.top5ArtsList = data;
    },
    getCategoriesWithSubCatComma(state, data) {
        state.data.categoriesWithSubCat = data;
    },
    getHomeFeaturedArtist(state, data) {
        state.data.homeFeaturedArtist = data;
    },
    getClientFeedback(state, data) {
        state.data.clientFeedback = data;
    },
    // Artist Detail
    getArtistDetail(state, data) {
        state.data.artistDetail = data;
    },
    getArtsByArtist(state, data) {
        state.data.artsByArtist = data;
    },
    getArtistFollowers(state, data) {
        state.data.artistFollowers = data;
    },
    getArtsByArtistNine(state, data) {
        state.data.artsByArtistNine = data;
    },
    // Plan Detail
    getPlanDetail(state, data) {
        state.data.planDetail = data;
    },
    // Detail page categories
    getCategoriesDetail(state, data) {
        state.data.categoriesDetail = data;
    },
    getSubCategories(state, data) {
        state.data.subCategoriesList = data;
    },
    getfilterDataCategories(state, data) {
        state.data.filterDataCategories = data;
    },
    // Get single product
    // getSingleProductDetails(state, data) {
    //     state.data.singleProductDetail = data;
    // },
    getCommentList(state, data) {
        state.data.commentsList = data;
    },
    getFooterData(state, data) {
        state.data.footerData = data;
    },
    getFAQData(state, data) {
        state.data.faqData = data;
    },
    getFAQFilterData(state, data) {
        state.data.faqDataFilter = data;
    },
};
