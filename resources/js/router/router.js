import { createRouter, createWebHistory } from "vue-router/dist/vue-router";

import Index from "../views/layout/Index.vue";
import Login from "../views/auth/Login.vue";
import Registration from "../views/auth/Registration.vue";
import Dashboard from "../views/admin/dashboard/Dashboard.vue";
import User from "../views/admin/User.vue";

const routes = [
    {
        path: '/',
        name: 'index',
        component: Index
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/registration',
        name: 'registration',
        component: Registration
    },
    {
        path: '/user',
        name: 'user',
        component: User,
        children: [
            {
                // UserProfile will be rendered inside User's <router-view>
                // when /user/:id/profile is matched
                path: '/dashboard',
                name: 'dashboard',
                component: Dashboard
            },
        ],
    },

    {
        path: '/user/test',
        name: 'test',
        component: User
    },
]

const router = createRouter({
    routes,
    // history: createWebHistory(process.env.BASE_URL)
    history: createWebHistory(import.meta.env.BASE_URL)
})

router.beforeEach((to, from, next) => {
    const token = localStorage.getItem('x-token')

    if(!token) {
        if (to.name === 'login' || to.name === 'registration') {
            return next()
        } else {
            return next ({
                name: 'login'
            })
        }
    }
    if (to.name === 'login' || to.name === 'registration' && token) {
        return next({
            name: 'user'
        })
    }
    next()
})

export default router;
