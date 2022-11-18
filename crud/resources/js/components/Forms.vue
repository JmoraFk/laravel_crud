<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card-header"><strong>Validar Formulario</strong></div>
                <div class="card-body">
                    <div class="col-12">
                        <div class="form-group">
                            <my-input 
                            :name="'Username'" 
                            :rules="{required: true, min: 5}" 
                            :value="username.value"
                            @update="update"
                            ></my-input>
                            <my-input 
                            :name="'Password'" 
                            :input_type="'password'" 
                            :rules="{required: true, min: 10}" 
                            :value="password.value"
                            @update="update"
                            ></my-input>
                        </div>
                    </div>
                    <br>
                    <form-button @validate="validate_fields" :btn_txt="'Validar'" :disabled="!is_valid"></form-button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import FormButton from './form_components/MyButton.vue';
    import MyInput from './form_components/MyInput.vue';
    export default{
        name: "Forms",
        components: {
            FormButton,
            MyInput
        },
        data(){
            return {
                message: "Form component",
                is_valid: true,
                username: {
                    value: '',
                    valid: false
                },
                password: {
                    value: '',
                    valid: false
                }
            }
        },
        methods: {
            update(payload){
                this[payload.name.toLowerCase()].value = payload.value;
            },
            validate_fields(){
                let username = document.querySelector("#nombre").value;
                let password = document.querySelector("#password").value;
                console.log(username);
            }
        }
    }
</script>

// Scoped indica que solo se va a indicar a este componte
<style scoped>
    h1{
        color: red;
    }
</style>