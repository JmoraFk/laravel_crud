const Contact = () => import("./components/Contact.vue");
const Home = () => import("./components/Home.vue");

// Componentes para el producto

const ProductShow = () => import("./components/product/Show.vue");
const ProductEdit = () => import("./components/product/Edit.vue");
const ProductCreate = () => import("./components/product/Create.vue");

export const routes = [
    {
        name: "home",
        path: "/home",
        component: Home,
    },
    {
        name: "contact",
        path: "/contact",
        component: Contact
    },{
        name: "products_show",
        path: "/products",
        component: ProductShow
    },{
        name: "product_edit",
        path: "/edit",
        component: ProductEdit
    },{
        name: "product_create",
        path: "/create",
        component: ProductCreate
    }
];