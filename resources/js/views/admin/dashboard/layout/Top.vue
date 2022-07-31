<template>

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="/public/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <router-link :to="{name: 'dashboard_index'}" class="nav-link">Home</router-link>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
            <li>
                <a class="nav-link" @click.prevent="logout" role="button">
                    <i class="fas fa-solid fa-right-from-bracket"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

</template>

<script>
export default {
    name: "TopNav",

    methods: {
        logout(){
            this.$store.dispatch('logout', this.user);
        },
    }
}
</script>

<style scoped>

</style>
