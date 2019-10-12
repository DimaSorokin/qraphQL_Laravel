<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a href="/" class="navbar-brand">Project Manager</a>
                    <button class="navbar-toggler" type="button" data-toggle="somes">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse justify-content-end" id="test">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Dashboard</a>
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
        name: "App"
    }
</script>

<style scoped>

</style>
