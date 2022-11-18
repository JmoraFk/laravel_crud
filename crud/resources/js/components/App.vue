<script>
export default {
    data() {
        return {
            greeting: 'App Vue'
        }
    },
    methods: {
        logout_session(){
            this.axios.post("/api/logout").then(response => { 
                console.log(response);
            })
            .catch(error => {
                console.log(error);
            });
        }
    }
}
</script>

<template>
    <main>
        <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
            <div class="container-fluid">
                <div class="container">
                    <a class="navbar-brand" href="#">
                      <img src="https://www.gcpcas.com/site/images/LogoFacturatech.png" alt="" width="100" height="100">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <router-link exact-active-class="active" to="/product_home" class="nav-link active" aria-current="page">Inicio</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link exact-active-class="active" to="/product_list" class="nav-link active">Productos</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link exact-active-class="active" to="/product_contact" class="nav-link active">Contacto</router-link>
                        </li>
                        <label for="nav-item">
                            <router-link exact-active-class="active" :to="{name: 'forms_url'}" class="nav-link active">Forms</router-link>
                        </label>
                        <li class="nav-item">
                            <form method="POST" @submit.prevent="logout_session">
                                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                                    Cerrar Sesi&oacute;n
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div>
            <router-view>

            </router-view>
        </div>
    </main>
</template>

<style>
    .greeting {
        color: red;
        font-weight: bold;
    }
</style>