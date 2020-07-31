import Vue from 'vue'
import VueRouter from 'vue-router';
import VueToastr from "vue-toastr";
import config from './../config'

//Import All component Here
import Home from './components/public/Home';

import Recipe from './components/public/Recipe';
import RecipesByCategory from './components/public/RecipesByCategory';
import RecipesByAuthor from './components/public/RecipesByAuthor';
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
import BlogDetail from './components/public/BlogDetail';


//alert(config.URL_PREFIX_ADMIN)
Vue.use(VueRouter)
const router = new VueRouter({
    base: '/',
    mode: "history",
    linkExactActiveClass: "active",
    routes: [
        { name: "index", path: "/", component: Home },
        { name: "about-us", path: "/about-us", component: About },
        { name: "contact-us", path: "/contact-us", component: ContactUs },
        { name: "recipe-categories", path: "/categories", component: Categories },
        { name: "recipes", path: "/recipes", component: Recipe },
        { name: "recipesByCategory", path: "/recipes/category/:slug", component: RecipesByCategory },
        { name: "recipesByAuthor", path: "/recipes/author/:slug", component: RecipesByAuthor },
        { name: "recipesByTag", path: "/recipes/tag/:slug", component: RecipesByTag },
        { name: "recipeDetail", path: "/recipe/:slug", component: RecipeDetail },
        { name: "authors", path: "/authors", component: Authors },
        { name: "authorsDetail", path: "/authors/:slug", component: AuthorDetail },
        { name: "shop", path: "/shop", component: Shop },
        { name: "shopDetail", path: "/shop/:slug", component: ShopDetail },
        { name: "blog", path: "/blog", component: Blog },
        { name: "blogDetail", path: "/blog/:slug", component: BlogDetail },
        //404 no route redirect   
        { name: "404", path: "**", redirect: '/' }
    ],
    scrollBehavior(to, from, savedPosition) {
        return { x: 0, y: 0 }
    }
});

export default router;