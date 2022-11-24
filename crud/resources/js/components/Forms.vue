<template>
    <div class="root">
        <h2 class="d-flex justify-content-center">Create an Account</h2>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" v-model="email">
            <span :class="[{'error-message': v$.email.$error}]" v-if="v$.email.$error">
                <i v-for="error in v$.email.$errors" :key="error.$message">
                    <span>
                        {{ error.$message }}
                        <span v-if="v$.email.$errors.length > 1">,&nbsp;</span>
                    </span>
                </i>
            </span>
            <span v-else></span>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" v-model="password.password">
            <span :class="[{'error-message': v$.password.confirm.$error} ]" v-if="v$.password.password.$error">{{ v$.password.password.$errors[0].$message }}</span>
            <span v-else></span>
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password" v-model="password.confirm">
            <span :class="[{'error-message': v$.password.confirm.$error}]" v-if="v$.password.confirm.$error">{{ v$.password.confirm.$errors[0].$message }}</span>
            <span v-else></span>
        </div>
        <div class="form-group">
            <input type="checkbox" v-model="check_active">
        </div>
        <div class="d-flex justify-content-center">
            <button @click="submitForm" class="btn btn-outline-success">Submit</button>
        </div>
    </div>
</template>

<script>
    import useValidate from '@vuelidate/core';
    import { required, email, minLength, sameAs, helpers } from "@vuelidate/validators";

    const mustBeLearnVue = (value) => value.includes("learnvue");
    export default {
        name: "Forms",
        setup: () => ({ v$: useValidate() }),
        data() {
            return {
                message: "Hola mundo",
                email: "",
                password: {
                    password: '',
                    confirm: ''
                },
                check_active: true
            }
        },
        methods: {
            submitForm() {
                this.v$.$validate();
                let has_error = this.v$.$error;
                if(!has_error){
                    alert("Formulario correcto");
                }
            }
        },
        validations() {
            return {
                email: {
                    required: helpers.withMessage("Este campo es requerido", required),
                    email: helpers.withMessage(`No es una dirección de correo valida`, email), 
                    mustBeLearnVue: helpers.withMessage("El correo debe contener 'learnvue'", mustBeLearnVue),
                },
                password: {
                    password: {
                        required: helpers.withMessage('La contraseña es requerida', required),
                        minLength: helpers.withMessage('El minimo de caracteres que debe tener este campo son 6', minLength(6)) 
                    },
                    confirm: {
                        required: helpers.withMessage('Es necesario confirmar la contraseña', required),
                        sameAs: helpers.withMessage('La contraseña debe ser igual', sameAs(this.password.password)) 
                    }
                }
            }
        }
    }
</script>

<style scoped>
    .root{
        width: 400px;
        margin: 0 auto;
        background-color: #fff;
        padding: 30px;
        margin-top: 100px;
        border-radius: 20px;
        border: 1px solid rgba(0,0,0,.5)!important;
    }

    h2{
        margin-bottom: 30px;
    }

    input{
        border: 1px solid rgba(0,0,0,.5)!important;
        outline: none;
        border-radius: 5px;
    }

    button{
        margin-top: 20px;
    }

    .error-message{
        color: #DC3545;
        font-size: 13px;
    }

</style>