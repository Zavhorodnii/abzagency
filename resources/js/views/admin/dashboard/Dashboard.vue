<template>

    <TopNav></TopNav>

    <LeftAside></LeftAside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">

            <router-view></router-view>

        </section>
    </div>
    <!-- /.content-wrapper -->

    <ControlAside></ControlAside>

    <Footer></Footer>

</template>

<script>
import LeftAside from "./layout/LeftAside.vue";
import TopNav from "./layout/Top.vue";
import ControlAside from "./layout/ControlAside.vue";
import Footer from "./layout/Footer.vue";
export default {
    name: "Dashboard",
    components: {Footer, ControlAside, TopNav, LeftAside},
    methods: {
        logout(){
            this.$store.dispatch('logout', this.user);
        },
    }
}
</script>

<style scoped>

</style>
