<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card-header"><strong>Validar Formulario</strong></div>
                <div class="card-body">
                    <div class="col-12">
                        <form @submit.prevent="send_form">
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
                                <form-button :btn_txt="'Validar'" :disabled="!is_form_valid"></form-button>
                            </div>
                        </form>
                    </div>
                    <br>
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
                username: {
                    value: '',
                    valid: false,
                },
                password: {
                    value: '',
                    valid: false,
                }
            }
        },
        methods: {
            update(payload){
                let name = payload.name.toLowerCase();
                let element;
                if(name === "username"){
                    element = this.username;
                }
                else if (name === "password"){
                    element = this.password;
                }
                element.value = payload.value;
                element.valid = payload.validar;
            },
            send_form(event){
                const default_object = {
                    value: '',
                    valid: false
                }
                this.username = this.password = default_object;
                alert("Formulario enviado");
            }
        },
        computed: {
            is_form_valid(){
                return (this.username.valid && this.password.valid);
            }
        }
    }
</script>

// Scoped indica que solo se va a indicar a este componte
<style scoped>
    h1{
        color: red;
    }

    form{
        border: 1rem ;
    }
</style>