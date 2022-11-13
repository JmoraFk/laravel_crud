const Contact = () => import("./components/Contact.vue");
const Home = () => import("./components/Home.vue");

// Componentes para el producto

const ProductShow = () => import("./components/product/Show.vue");
const ProductEdit = () => import("./components/product/Edit.vue");
const ProductCreate = () => import("./components/product/Create.vue");

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
    }
];