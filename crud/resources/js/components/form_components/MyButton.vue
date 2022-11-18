<template>
    <button @click="$emit('validate')" type="submit" :class="['btn', btn_class]" :disabled="disabled">{{ btn_txt }}</button>
</template>

<script>
    export default{
        name: "FormButton",
        data(){
            return {
                message: "Hola mundo"
            }
        },
        // emits: {
            // validate(username, password){
                // console.log("Validate desde el boton");
                // console.log(username);
                // console.log(password);
            // }
        // },
        props: {
            btn_txt: {
                type: String,
                required: true
            },
            btn_class: {
                type: String,
                default: "btn-outline-primary"
            },
            btn_disabled: {
                type: Boolean,
                default: false
            }
        }
    }
</script>

<style scoped>

    button:disabled{
        opacity: 0.5;
    }

    button{
        border-radius: 5px;
        padding: 10px;
        font-size: 16px;
        cursor: pointer;
    }

    button:hover{
        filter: brightness(125%);
    }
</style>