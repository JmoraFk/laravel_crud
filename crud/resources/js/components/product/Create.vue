<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card-header"><h2>Crear Producto</h2></div>
                <div class="card-body">
                    <form @submit.prevent="create_product">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label for="product_name"><strong>Nombre</strong></label>
                                    <input type="text" name="product_name" class="form-control" v-model="product.name">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label for="product_description"><strong>Descripci&oacute;n</strong></label>
                                    <textarea name="product_description" class="form-control" style="width: ;100%" rows="10" v-model="product.description"></textarea>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label for="product_price"><strong>Precio</strong></label>
                                    <input type="number" name="product_price" step=".01" class="form-control" v-model="product.price">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <button type="submit" class="btn btn-outline-success">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        name: "create_product",
        data(){
            return{
                product: {
                    name: "",
                    description: "",
                    price: ""
                }
            }
        },
        methods: {
            async create_product(){
                await this.axios.post("/api/product", this.product)
                    .then(response => {
                        this.$router.push({name:"show_products"});
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        }
    }
</script>