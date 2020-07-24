export default {
    //Clients
    getClients(state, data) {
        state.data.getClients = data;
    },
    editClients(state, data) {
        state.data.editClients = data;
    },
    //Authors
    getAuthors(state, data) {
        state.data.getAuthors = data;
    },
    editAuthors(state, data) {
        state.data.editAuthors = data;
    },
    //Categories
    getCategories(state, data) {
        state.data.getCategories = data;
    },
    editCategories(state, data) {
        state.data.editCategories = data;
    }
};