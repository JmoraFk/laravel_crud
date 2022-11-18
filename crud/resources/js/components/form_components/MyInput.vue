<template>
    <div class="input-wrapper">
        <div>
            <p class="label"><label :for="name" v-text="name"></label><span :class="['error',]" v-text="validate_input"></span></p>
        </div>
        <input 
            @input="$emit('update', {
                value: $event.target.value,
                name: name,
                validar: validate($event.target.value) ? false : true,
            } )" 
            :id="name.toLowerCase()" :type="input_type" :class="['form-control']" 
            :placeholder="name" 
            :value="value"
        >
    </div>
</template>

<script>
    export default{
        name: "MyInput",
        data(){
            return {
                message: "MyInput"
                // value: "",
            }
        },
        props: {
            name: {
                type: String,
                required: true
            },
            rules: {
                type: Object,
                required: true
            },
            value: {
                type: String
            },
            input_type: {
                type: String,
                default: "text"
            }
        },
        computed: {
            validate_input(){
                return this.validate(this.value);
            }
        },
        methods: {
            validate(value){
                if (this.rules.required && !value){
                    return 'Campo Requerido';
                }

                if(this.rules.min > value.length && this.rules.required){
                    return 'Debe tener minimo ' + this.rules.min + ' caracteres';
                }
            }
        }
    }
</script>

<style scoped>
    .input-wrapper{
        display: flex;
        flex-direction: column;
    }

    div{
        display: flex;
        flex-direction: column;
    }

    .error{
        color: #dc3545;
    }

    .label{
        display: flex;
        justify-content: space-between;
    }

    label{
        font-weight: bold;
    }

    input{
        border-radius: 5px;
        padding: 10px;
        font-size: 16px;
    }
</style>