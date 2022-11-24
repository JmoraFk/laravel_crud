<template>
    <div class="d-flex justify-content-center">
        <span class="badge bg-primary">{{ message }}</span>
    </div>
</template>

<script>
    export default{
        name: "Vuex",
        data() {
            return {
                message: "Vuex View"
            }
        },
        methods: {

        }
    }
</script>


<style scoped>

    div{
        margin: 10px 0px 0px 0px;
    }

</style>