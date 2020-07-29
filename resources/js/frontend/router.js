import Vue from 'vue'
import VueRouter from 'vue-router';
import VueToastr from "vue-toastr";
import config from './../config'

//Import All component Here
import Home from './components/public/Home.vue';

import RecipeSearch from './components/public/RecipeSearch.vue';
import RecipeDetail from './components/public/RecipeDetail.vue';
import CategoryRecipes from './components/public/CategoryRecipes.vue';

import Categories from './components/public/Categories.vue';

import About from './components/public/About.vue';
import ContactUs from './components/public/ContactUs.vue';

import Authors from './components/public/Authors.vue';
import AuthorDetail from './components/public/AuthorDetail.vue';

import Shop from './components/public/Shop.vue';
import ShopDetail from './components/public/ShopDetail.vue';

import Blog from './components/public/Blog.vue';
import BlogDetail from './components/public/BlogDetail.vue';


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
        { name: "recipes", path: "/recipes", component: RecipeSearch },
        { name: "recipesWithCategory", path: "/recipes/category/:slug", component: CategoryRecipes },
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