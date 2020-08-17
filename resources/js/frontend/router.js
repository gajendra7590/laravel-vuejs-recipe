import Vue from "vue";
import VueRouter from "vue-router";
import VueToastr from "vue-toastr";
import config from "./../config";
Vue.use(VueRouter);
//Import All component Here
import Home from "./components/public/Home";

import Recipe from "./components/public/Recipe";
import RecipesByCategory from "./components/public/RecipesByCategory";
import RecipesByTag from "./components/public/RecipesByTag";
import RecipeDetail from "./components/public/RecipeDetail";

import Categories from "./components/public/Categories";

import About from "./components/public/About";
import ContactUs from "./components/public/ContactUs";

import Authors from "./components/public/Authors";
import AuthorDetail from "./components/public/AuthorDetail";

import Shop from "./components/public/Shop";
import ShopDetail from "./components/public/ShopDetail";

import Blog from "./components/public/Blog";
import BlogByTag from "./components/public/BlogByTag";
import BlogByCategories from "./components/public/BlogByCategories";
import BlogDetail from "./components/public/BlogDetail";

import ResetPassword from "./components/public/ResetPassword";
import VerifyEmail from "./components/public/VerifyEmail";

//Account
import MyAccount from "./components/protected/MyAccount";
import Profile from "./components/protected/Profile";
import ChangePassword from "./components/protected/ChangePassword";
import RecipeForm from "./components/protected/RecipeForm";
import RecipeList from "./components/protected/RecipeList";

const router = new VueRouter({
    base: "/",
    mode: "history",
    linkExactActiveClass: "active",
    routes: [{
            name: "home",
            path: "/home",
            component: Home,
            meta: { requireAuth: false, role: "any" },
        },
        {
            name: "resetPassword",
            path: "/reset-password",
            component: ResetPassword,
            meta: { requireAuth: false, role: "any" },
        },
        {
            name: "verifyEmail",
            path: "/verify-email",
            component: VerifyEmail,
            meta: { requireAuth: false, role: "any" },
        },
        {
            name: "about-us",
            path: "/about-us",
            component: About,
            meta: { requireAuth: false, role: "any" },
        },
        {
            name: "contact-us",
            path: "/contact-us",
            component: ContactUs,
            meta: { requireAuth: false, role: "any" },
        },
        {
            name: "recipe-categories",
            path: "/categories",
            component: Categories,
            meta: { requireAuth: false, role: "any" },
        },
        {
            name: "recipes",
            path: "/recipes",
            component: Recipe,
            meta: { requireAuth: false, role: "any" },
        },
        {
            name: "recipesByCategory",
            path: "/recipes/category/:slug",
            component: RecipesByCategory,
            meta: { requireAuth: false, role: "any" },
        },
        {
            name: "authorDetail",
            path: "/author/:slug",
            component: AuthorDetail,
            meta: { requireAuth: false, role: "any" },
        },
        {
            name: "recipesByTag",
            path: "/recipes/tag/:slug",
            component: RecipesByTag,
            meta: { requireAuth: false, role: "any" },
        },
        {
            name: "recipeDetail",
            path: "/recipe/:slug",
            component: RecipeDetail
        },
        {
            name: "authors",
            path: "/authors",
            component: Authors,
            meta: { requireAuth: false, role: "any" },
        },
        {
            name: "authorsDetail",
            path: "/authors/:slug",
            component: AuthorDetail,
            meta: { requireAuth: false, role: "any" },
        },
        {
            name: "shop",
            path: "/shop",
            component: Shop,
            meta: { requireAuth: false, role: "any" },
        },
        {
            name: "shopDetail",
            path: "/shop/:slug",
            component: ShopDetail,
            meta: { requireAuth: false, role: "any" },
        },
        {
            name: "blogs",
            path: "/blogs",
            component: Blog,
            meta: { requireAuth: false, role: "any" },
        },
        {
            name: "blogsByTag",
            path: "/blogs/tag/:slug",
            component: BlogByTag
        },
        {
            name: "blogsByCategories",
            path: "/blogs/category/:slug",
            component: BlogByCategories,
            meta: { requireAuth: false, role: "any" },
        },
        {
            name: "blogsDetail",
            path: "/blogs/:slug",
            component: BlogDetail,
            meta: { requireAuth: false, role: "any" },
        },
        //Account Pages
        {
            name: "myAccount",
            path: "/my-account",
            component: MyAccount,
            meta: { requireAuth: true, role: "any" },
            children: [{
                    name: "profile",
                    path: "profile",
                    component: Profile,
                    meta: { requireAuth: true, role: "any" },
                },
                {
                    name: "changePassword",
                    path: "change-password",
                    component: ChangePassword,
                    meta: { requireAuth: true, role: "any" },
                },
                {
                    name: "recipesList",
                    path: "recipes-list",
                    component: RecipeList,
                    meta: { requireAuth: true, role: "author" },
                },
                {
                    name: "createRecipe",
                    path: "create-recipe",
                    component: RecipeForm,
                    meta: { requireAuth: true, role: "author" },
                },
                {
                    name: "editRecipe",
                    path: "edit-recipe/:slug",
                    component: RecipeForm,
                    meta: { requireAuth: true, role: "author" },
                },
            ],
        },
        //404 no route redirect
        {
            name: "404",
            path: "**",
            redirect: "/home"
        },
    ],
    scrollBehavior(to, from, savedPosition) {
        return { x: 0, y: 0 };
    },
});

let userData = localStorage.getItem('USER_SESSION');
let token = null;
let role = '';
if (!!userData) {
    try {
        userData = JSON.parse(userData);
        token = (typeof(userData.userToken) != 'undefined') ? userData.userToken : null;
        role = (typeof(userData.userRole) != 'undefined') ? userData.userRole : '';
    } catch (e) {
        //localStorage.removeItem('USER_SESSION');
    }
}

//Toastr Message Global config
Vue.use(VueToastr, {
    defaultTimeout: 3000,
    defaultProgressBar: false,
    defaultProgressBarValue: 0,
    defaultType: "success",
    maxOpened: 1,
    autoDismiss: true,
    closeButton: true
});

const vm = new Vue();

router.beforeResolve((to, from, next) => {
    if (to.matched.some((record) => record.meta.requireAuth)) {
        if (to.meta.role == 'author') {
            if (role == 'author') {
                next();
            } else {
                vm.$toastr.e('Your are not authorised to access', 'UnAuthorised');
                return false;
            }
        } else {
            next();
        }
    } else {
        next(); // make sure to always call next()!
    }
});

export default router;