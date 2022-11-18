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
            items_page: 10,
            paginate_data: [],
            current_page: 1,
            previous_disabled: true,
            next_disabled: false
        }
    },
    mounted(){
        this.show_products();
    },
    methods: {
        async show_products(){
            await this.axios.get("api/product")
                .then(response => {
                    this.products = response.data.products;
                })
                .catch(error => {
                    this.products = [];
                    console.error(error);
                });
            this.getDataPage(1);
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
        },
        calculate_page_total(){ //Obtener el total de paginas
            return Math.ceil(this.products.length / this.items_page);
        },
        getDataPage(page_num){
            let start = (page_num * this.items_page) - this.items_page;
            let end = (page_num * this.items_page);
            let total_pages = this.calculate_page_total();
            this.paginate_data = this.products.slice(start, end);
            this.current_page = page_num;
            
            if((this.current_page + 1) >  total_pages){
                this.next_disabled = true;
            }
            else{
                this.next_disabled = false;
            }

            if((this.current_page -1) < 1){
                this.previous_disabled = true;
            }
            else{
                this.previous_disabled = false;
            }
        },
        getPreviousPage(){
            let previous_page = this.current_page - 1;
            this.getDataPage(previous_page);
        },
        getNextPage(){
            let next_page = this.current_page + 1;
            let total_pages = this.calculate_page_total();
            this.getDataPage(next_page);
        },
    },
    computed: {
        get_products(){
            return this.products;
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
                        <tbody v-for="product in paginate_data" :key="product.id">
                            <table-row :id="product.id" :name="product.name" :description="product.description" :price="product.price"/>
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                          <li :class="[{'disabled': previous_disabled}, 'page-item']">
                            <a @click="getPreviousPage()" class="page-link" href="#" tabindex="-1">Previous</a>
                          </li>
                          <li class="page-item" v-for="item in calculate_page_total()" :key="item" @click="getDataPage(item)"><a class="page-link" href="#">{{ item }}</a></li>
                          <li v-bind:class="[{'disabled': next_disabled}, 'page-item']">
                            <a @click="getNextPage()" class="page-link" href="#">Next</a>
                          </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</template>

<style>

</style>