// import { createRouter, createWebHashHistory } from "vue-router";
import { createWebHistory, createRouter } from "vue-router";
import { UserStore } from '@/store/UserStore';
import login from "../components/Login.vue";
// Set all routes
const routes = [
    {
        path: "/",
        component: login,
        children: [
            {
                path: "",
                name: "login",
                component: login,
                meta: {
                    requiresAuth: false,
                },
            },
        ],
    },
    {
        path: "/dashboard",
        name: "dashboard",
        component: () => import("../components/Dashboard.vue"),
        meta: {
            requiresAuth: true,
        },
    },
    {
      path: "/add-user",
      name: "adduser",
      component: () => import("../components/AddUser.vue"),
      meta: {
            requiresAuth: true,
        },
    },
    {
        path: "/view-user/:id",
        name: "viewuser",
        component: () => import("../components/AddUser.vue"),
        meta: {
          requiresAuth: true,
        },
    },
    {
        path: "/add-company",
        name: "addcompany",
        component: () => import("../components/AddCompany.vue"),
        meta: {
            requiresAuth: true,
        },
    },
];

// Create Router
const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from) => {
    const store = UserStore();

    if (to.meta.requiresAuth && store.token == 0) {
        return { name: "login" };
    }
    if (to.meta.requiresAuth == false && store.token != 0) {
        return { name: "dashboard" };
    }
});

export default router;
