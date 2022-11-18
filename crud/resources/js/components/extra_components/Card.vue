<script>

export default {
    name: "ExampleCard",
    data(){
        return {
        }
    },
    props: {
        name: {
            type: String,
            default: "",
            required: false
        },
        description: {
            type: String,
            default: "",
            required: false
        },
        price: {
            type: Number,
            default: 0.0,
            required: false
        },
        created: {
            type: String,
            default: "",
            required: false
        }
    },
    methods: {
        
    },
    computed: {

    }
}

</script>

<template>
    <div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title" v-text="name"></h5>
                <p class="card-text" v-text="description"></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item" v-text="price"></li>
                <li class="list-group-item" v-text="created"></li>
                <li class="list-group-item">Vestibulum at eros</li>
            </ul>
            <div class="card-body">
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div>
    </div>    
</template>