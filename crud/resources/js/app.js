import './bootstrap';
import '../css/app.css'; 

import { createApp } from 'vue'

import App from './components/App.vue';

// Importación de axios
import VueAxios from 'vue-axios';
import axios from 'axios';


// Importación de Vue Router
import { createWebHistory, createRouter }  from "vue-router";
import { routes } from './routes';


const router = createRouter({
    history: createWebHistory(),
    routes,
});

console.log("Se ejecuta");

const app = createApp({
    el: "#crud_div_app", //Elemento div con id app
    render: h => h(App)
});

app.use(router);
app.use(VueAxios, axios);


console.log("A huevo");

export default {
    components: {
      App
    }
  }