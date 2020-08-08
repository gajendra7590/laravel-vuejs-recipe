import Vue from 'vue'
import VueRouter from 'vue-router';
import VueToastr from "vue-toastr";
import config from './../config'

//Import All component Here
import Home from './components/public/Home';

import Recipe from './components/public/Recipe';
import RecipesByCategory from './components/public/RecipesByCategory';
import RecipesByTag from './components/public/RecipesByTag';
import RecipeDetail from './components/public/RecipeDetail';


import Categories from './components/public/Categories';

import About from './components/public/About';
import ContactUs from './components/public/ContactUs';

import Authors from './components/public/Authors';
import AuthorDetail from './components/public/AuthorDetail';

import Shop from './components/public/Shop';
import ShopDetail from './components/public/ShopDetail';

import Blog from './components/public/Blog';
import BlogByTag from './components/public/BlogByTag';
import BlogByCategories from './components/public/BlogByCategories';
import BlogDetail from './components/public/BlogDetail';


//alert(config.URL_PREFIX_ADMIN)
Vue.use(VueRouter)
const router = new VueRouter({
    base: '/',
    mode: "history",
    linkExactActiveClass: "active",
    routes: [
        { name: "home", path: "/home", component: Home },
        { name: "about-us", path: "/about-us", component: About },
        { name: "contact-us", path: "/contact-us", component: ContactUs },
        { name: "recipe-categories", path: "/categories", component: Categories },
        { name: "recipes", path: "/recipes", component: Recipe },
        { name: "recipesByCategory", path: "/recipes/category/:slug", component: RecipesByCategory },
        { name: "authorDetail", path: "/author/:slug", component: AuthorDetail },
        { name: "recipesByTag", path: "/recipes/tag/:slug", component: RecipesByTag },
        { name: "recipeDetail", path: "/recipe/:slug", component: RecipeDetail },
        { name: "authors", path: "/authors", component: Authors },
        { name: "authorsDetail", path: "/authors/:slug", component: AuthorDetail },
        { name: "shop", path: "/shop", component: Shop },
        { name: "shopDetail", path: "/shop/:slug", component: ShopDetail },
        { name: "blogs", path: "/blogs", component: Blog },
        { name: "blogsByTag", path: "/blogs/tag/:slug", component: BlogByTag },
        { name: "blogsByCategories", path: "/blogs/category/:slug", component: BlogByCategories },
        { name: "blogsDetail", path: "/blogs/:slug", component: BlogDetail },
        //404 no route redirect   
        { name: "404", path: "**", redirect: '/home' }
    ],
    scrollBehavior(to, from, savedPosition) {
        return { x: 0, y: 0 }
    }
});

export default router;