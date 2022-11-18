<template>
    <tr>
        <td v-text="id"></td>
        <td v-text="name"></td>
        <td v-text="description"></td>
        <td v-text="price"></td>
        <td>
            <router-link :to='{name:"product_edit", params:id,  query: { id: id }}' class="btn btn-sm btn-outline-primary"><i class="fa fa-edit"></i></router-link>
            &nbsp;<a type="button" @click="delete_product(id)" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></a>
        </td>
    </tr>
</template>


<script>
    
    export default {
        name: "TableRow",
        data(){

        },
        props: ["id", "name", "description", "price"],
    }

</script>