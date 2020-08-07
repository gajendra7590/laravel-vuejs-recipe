export default {
    //Clients
    getClients(state, data) {
        state.data.getClients = data
    },
    getClients(state, data) {
        state.data.getClients = data
    },
    //Authors
    getAuthors(state, data) {
        state.data.getAuthors = data
    },
    editAuthors(state, data) {
        state.data.editAuthors = data
    },
    //Recipes
    getRecipes(state, data) {
        state.data.getRecipes = data
    },
    editRecipes(state, data) {
        state.data.editRecipes = data
    },
    //Recipe Categories
    getCategories(state, data) {
        state.data.getCategories = data;
    },
    categories(state, data) {
        state.data.categories = data;
    },
    //Recipe Tags
    getTags(state, data) {
        state.data.getTags = data;
    },
    tags(state, data) {
        state.data.tags = data;
    },
    //Blogs
    getBlogs(state, data) {
        state.data.getBlogs = data
    },
    editBlog(state, data) {
        state.data.editBlog = data
    },
    //Blog Categories
    blogCategories(state, data) {
        state.data.blogCategories = data;
    },
    getBlogCategories(state, data) {
        state.data.getBlogCategories = data;
    },
    //Blog Tags
    getBlogTags(state, data) {
        state.data.getBlogTags = data;
    },
    blogTags(state, data) {
        state.data.blogTags = data;
    },

};