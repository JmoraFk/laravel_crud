import './bootstrap';
import '../css/app.css'; 

import { createApp } from 'vue'

import App from './components/App.vue';

import VueAxios from 'vue-axios';
import axios from 'axios';

import { createWebHistory, createRouter }  from "vue-router";
import { routes } from './routes';

const router = createRouter({
    history: createWebHistory(),
    routes,
});

const app = createApp(App);
app.use(router);
app.use(VueAxios, axios);
app.mount("#crud_div_app");