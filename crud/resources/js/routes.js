import Contact from "./components/Contact.vue";
import Home from "./components/Home.vue";

// Componentes para el producto

import ProductShow from "./components/product/Show.vue";
import ProductEdit from "./components/product/Edit.vue";
import ProductCreate from "./components/product/Create.vue";
import Forms from './components/Forms.vue';
import Notes from "./components/Notes.vue";
import Vuex from "./components/Vuex.vue";
import ExtraComponent from "./components/extra_components/ExtraRoute.vue";

export const routes = [
    {
        name: "home",
        path: "/product_home",
        component: Home,
    },
    {
        name: "contact",
        path: "/product_contact",
        component: Contact,
        children: [
            {
                name: "contact_home",
                path: "extra",
                component: Home
            }
        ]
    },{
        name: "product_show",
        path: "/product_list",
        component: ProductShow
    },{
        name: "product_edit",
        // path: "/product_edit/:product_id?",
        path: "/product_edit/:product_id(\\d*)",
        component: ProductEdit,
        sensitive: true,
    },{
        name: "product_create",
        path: "/product_create",
        component: ProductCreate
    },
    {
        name: "forms_url",
        path: "/product_forms",
        component: Forms
    },
    {
        name: "notes_url",
        path: "/product_notes",
        component: Notes
    },
    {
        name: "vuex",
        path: "/product_vuex",
        component: Vuex
    }
];