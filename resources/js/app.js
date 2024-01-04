import './bootstrap';
import { createApp } from "vue";
import { createPinia } from "pinia";
import piniaPluginPersistedstate from 'pinia-plugin-persistedstate';
import App from "./App.vue";
import router from "./router";
const app = createApp(App);

//import * as bootstrap from "bootstrap";
//window.bootstrap = bootstrap;

//import login from './components/Login.vue';

const pinia = createPinia();
pinia.use(piniaPluginPersistedstate)
app.use(pinia);
app.use(router);
//app.component("login", login);
app.mount("#app");