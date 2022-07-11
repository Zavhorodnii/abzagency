<template>

    <v-container>
        <div class="d-flex justify-end mb-6">
            <router-link :to="{name: 'login'}"><Button>Login</Button></router-link>
            <router-link :to="{name: 'registration'}"><Button>Registration</Button></router-link>
        </div>
    </v-container>

</template>

<script>

export default {
    name: "Index",
}

</script>

<style scoped>
a{
    color: white;
    text-decoration: none;
}
</style>
