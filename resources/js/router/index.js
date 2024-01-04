import { createRouter, createWebHashHistory } from "vue-router";

// import login
// Import the login component
import login from '../components/Login.vue';
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
        },
      ],
    },
  ];
  
  // Create Router
  const router = createRouter({
    history: createWebHashHistory(),
    linkActiveClass: "active",
    linkExactActiveClass: "active",
    scrollBehavior() {
      return { left: 0, top: 0 };
    },
    routes,
  });


  export default router;
