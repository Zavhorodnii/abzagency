<template>

    <Button  @click.prevent="logout">Logout</Button>

    <h1>User</h1>

</template>

<script>

export default {
    name: "User",
    mounted() {
        this.getData()
    },
    methods: {
        logout(){
            this.$store.dispatch('logout', this.user);
        },
    }
}
</script>

<style scoped>

</style>
