<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card-header"><h2>Editar Producto</h2></div>
                <div class="card-body">
                    <form @submit.prevent="edit_product">
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
                                <button type="submit" class="btn btn-outline-success">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "edit_product",
    data(){
        return {
            product: {
                name: "",
                description: "",
                price: ""
            }
        }
    },
    mounted(){
        console.log("Se edito");
        this.show_product();
    },
    methods: {
        async show_product(){
            let product_id = this.$route.query.id;
            await this.axios.get("api/product/" + product_id)
                .then(response => {
                    const {name, description, price, created_by, last_updated} = response.data.product;
                    this.product.name = name;
                    this.product.description = description;
                    this.product.price = price;
                    console.log("Debio poner la info");
                })
                .catch(error => {
                    console.log(error);
                });
        },
        async edit_product(){
            let product_id = this.$route.query.id;
            await this.axios.put("api/product/" + product_id, this.product)
                .then(response => {
                    this.$router.push({
                        "name": "product_show"
                    });
                })
                .catch(error => {

                });
        }
    }
}
</script>