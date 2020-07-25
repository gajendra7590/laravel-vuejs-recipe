import Vue from 'vue'
import VueRouter from 'vue-router';
import VueToastr from "vue-toastr";
import config from '../config'
//Import All component Here
import Dashboard from './components/protected/Dashboard';
//Categories
import CategoriesList from './components/protected/categories/CategoriesList';
import CategoryForm from './components/protected/categories/CategoryForm.vue'
//Users
import ClientsList from './components/protected/users/ClientsList';
import ClientsForm from './components/protected/users/ClientsForm'
//Authors
import AuthorsList from './components/protected/users/AuthorsList';
import AuthorsForm from './components/protected/users/AuthorsForm';
//Auth
import Login from './components/public/Login';
import ForgotPassword from './components/public/ForgotPassword';
import SetNewPassword from './components/public/SetNewPassword';
//Logout
import LogOut from './components/protected/LogOut';
//Admin Profile
import UpdateProfile from './components/protected/user-profile/UpdateProfile';
import ChangePassword from './components/protected/user-profile/ChangePassword';

//alert(config.URL_PREFIX_ADMIN)
Vue.use(VueRouter)
const router = new VueRouter({
    base: config.URL_PREFIX_ADMIN,
    mode: "history",
    linkExactActiveClass: "active",
    routes: [
        { name: "login-admin", path: "/login", component: Login, meta: { visitorURL: true } },

        { name: "forgot-password-admin", path: "/forgot-password", component: ForgotPassword, meta: { visitorURL: true } },
        { name: "forgot-password-new", path: "/set-new-password", component: SetNewPassword, meta: { visitorURL: true } },

        { name: "loggedout-admin", path: "/logout", component: LogOut, meta: { protectedURL: true } },

        { name: "update-profile", path: "/update-profile", component: UpdateProfile, meta: { protectedURL: true } },
        { name: "change-password", path: "/change-password", component: ChangePassword, meta: { protectedURL: true } },

        { name: "index", path: "/", redirect: "/dashboard", meta: { protectedURL: true } },
        { name: "dashboard", path: "/dashboard", component: Dashboard, meta: { protectedURL: true } },
        //Categories Route
        { name: "categories-list", path: "/categories", component: CategoriesList, meta: { protectedURL: true } },
        { name: "edit-category", path: "/edit-category/:id", component: CategoryForm, meta: { protectedURL: true } },
        { name: "add-category", path: "/add-category", component: CategoryForm, meta: { protectedURL: true } },

        //Users Route
        { name: "clients-list", path: "/clients", component: ClientsList, meta: { protectedURL: true } },
        { name: "edit-clients", path: "/edit-clients/:id", component: ClientsForm, meta: { protectedURL: true } },
        { name: "add-clients", path: "/add-clients", component: ClientsForm, meta: { protectedURL: true } },

        //Authors Route
        { name: "authors-list", path: "/authors", component: AuthorsList, meta: { protectedURL: true } },
        { name: "edit-authors", path: "/edit-authors/:id", component: AuthorsForm, meta: { protectedURL: true } },
        { name: "add-authors", path: "/add-authors", component: AuthorsForm, meta: { protectedURL: true } },

        //404 no route redirect   
        { name: "404", path: "**", redirect: 'dashboard' }
    ],
    scrollBehavior(to, from, savedPosition) {
        return { x: 0, y: 0 }
    }
});

router.beforeResolve((to, from, next) => {
    if (to.matched.some(record => record.meta.protectedURL)) {
        if (!(!!localStorage.getItem('token'))) {
            window.location.href = config.BASE_URL_ADMIN + 'login';
        } else {
            next()
        }
    } else if (to.matched.some(record => record.meta.visitorURL)) {
        if ((!!localStorage.getItem('token'))) {
            window.location.href = config.BASE_URL_ADMIN + 'dashboard';
        } else {
            next()
        }
    } else {
        next() // make sure to always call next()!
    }
});

export default router;