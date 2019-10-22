<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a href="/" class="navbar-brand">Project Manager</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul v-if="loggerIn" class="navbar-nav">
                        <li class="nav-item">
                            <router-link class="nav-link" :to="'/'">Dashboard</router-link>
                        </li>
                        <li class="nav-item">
                            <a href="#" @click.prevent="logoff" class="nav-link">Logout</a>
                        </li>
                    </ul>
                    <ul v-else class="navbar-nav">
                        <li class="nav-item">
                            <router-link class="nav-link" :to="'/login'">Login</router-link>

                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" :to="'/register'">Register</router-link>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
        <section id="body-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <router-view></router-view>
                    </div>
                </div>
            </div>

        </section>
    </div>
</template>

<script>
    export default {
        name: "App",
        data() {
            return {
                loggerIn: false,
            }
        },
        created() {
            this.$appEvents.$on('log-on', () => {
                this.loggerIn = true;
            });
            if(sessionStorage.getItem('api-token')){
                this.loggerIn = true;
            }
        },
        methods: {
            logoff(){
                sessionStorage.removeItem('api-token');
                this.loggerIn = false;
                this.$router.push('/login');

            }
        },
    }
</script>

<style scoped>

</style>
