<script>
import TableRow from "../extra_components/Row.vue";

export default {
    name: "products",
    components: {
        TableRow
    },
    data(){
        return{
            products: [],
        }
    },
    mounted(){
        this.show_products();
    },
    methods: {
        async show_products(){
            await this.axios.get("api/product")
                .then(response => {
                    this.products = response.data;
                })
                .catch(error => {
                    this.products = [];
                    console.error(error);
                });
        },
        delete_product(product_id){
            console.log(product_id);
            let response = confirm("Eliminar el producto");
            if(response ){
                this.axios.delete("api/product/" + product_id)
                    .then(response => {
                        this.show_products();
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        }
    }
}
</script>

<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <br>
                <router-link :to='{name:"product_create"}' class="btn btn-success">Agregar&nbsp;<i class="fa fa-plus-circle"></i></router-link>
            </div>
    
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="bg-warning text-white">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripci&oacute;n</th>
                                <th>Precio</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody v-for="product in products.products" :key="product.id">
                            <table-row :id="product.id" :name="product.name" :description="product.description" :price="product.price"/>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<style>

</style>