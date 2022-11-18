import Contact from "./components/Contact.vue";
import Home from "./components/Home.vue";

// Componentes para el producto

import ProductShow from "./components/product/Show.vue";
import ProductEdit from "./components/product/Edit.vue";
import ProductCreate from "./components/product/Create.vue";
import Forms from './components/Forms.vue';

export const routes = [
    {
        name: "home",
        path: "/product_home",
        component: Home,
    },
    {
        name: "contact",
        path: "/product_contact",
        component: Contact
    },{
        name: "product_show",
        path: "/product_list",
        component: ProductShow
    },{
        name: "product_edit",
        path: "/product_edit",
        component: ProductEdit
    },{
        name: "product_create",
        path: "/product_create",
        component: ProductCreate
    },
    {
        name: "forms_url",
        path: "/product_forms",
        component: Forms
    }
];