<template>
    <button type="submit" :class="['btn', btn_class]" :disabled="disabled">{{ btn_txt }}</button>
</template>

<script>
    export default{
        name: "FormButton",
        data(){
            return {
                message: "Hola mundo"
            }
        },
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