import { createRouter, createWebHistory } from "vue-router";

import Home from "../pages/Home.vue";
import { authStore } from "../stores/authstore"

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home,
        // Klo blm login, paksa login
        meta: { requiresAuth: true },
        beforeEnter: (to, from, next) => {
            console.debug(authStore().token)
            if (!authStore().token) {
                next('/login');
            } else {
                next();
            }
        }

    },
    {
        path: '/login',
        name: 'Login',
        component: () => import("../pages/Login.vue")
    },
    {
        path: '/register',
        name: 'Register',
        component: () => import("../pages/Register.vue")
    },
    {
        path: '/dashboard',
        name: 'Dashboard',
        component: () => import("../pages/Dashboard.vue")
    }
];

const router = createRouter(
    {
        history: createWebHistory(),
        routes
    }
);

export default router;
