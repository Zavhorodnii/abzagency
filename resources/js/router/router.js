import { createRouter, createWebHistory } from "vue-router/dist/vue-router";

import Index from "../views/layout/Index.vue";
import Login from "../views/auth/Login.vue";
import Registration from "../views/auth/Registration.vue";
import User from "../views/admin/User.vue";

import Dashboard from "../views/admin/dashboard/Dashboard.vue";
import DashboardIndex from "../views/admin/dashboard/Index.vue";

import Position from "../views/admin/dashboard/Position/Position.vue";
import PositionIndex from "../views/admin/dashboard/Position/Index.vue";

import PositionCreate from "../views/admin/dashboard/Position/PositionCreate.vue";

const routes = [
    {
        path: '/',
        name: 'index',
        component: Index
    },
    {
        path: '/user',
        name: 'user',
        component: User,
        children: [
            {
                path: 'dashboard',
                name: 'dashboard',
                component: Dashboard,
                children: [
                    {
                        path: '',
                        name: 'dashboard_index',
                        component: DashboardIndex,
                    },
                    {
                        path: 'position',
                        name: 'position',
                        component: Position,
                        children: [
                            {
                                path: '',
                                name: 'position_index',
                                component: PositionIndex,
                            },
                            {
                                path: 'create',
                                name: 'position_create',
                                component: PositionCreate,
                            }
                        ]
                    },
                ],
            },
            {
                path: 'login',
                name: 'login',
                component: Login
            },
            {
                path: 'registration',
                name: 'registration',
                component: Registration
            },
        ],
    },
    {
        path: '/user',
        redirect: { name: 'dashboard' }
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
        } else if (to.name === 'dashboard') {
            return next ({
                name: 'login'
            })
        }
    }
    if (to.name === 'login' || to.name === 'registration' && token) {
        return next({
            name: 'dashboard'
        })
    }
    next()
})

export default router;
