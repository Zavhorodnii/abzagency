<template>
    <v-form
        ref="form"
        v-model="valid"
        lazy-validation
    >
        <v-container>
            <v-row justify="center">
                <v-col
                    cols="5"
                >
                    <v-text-field
                        v-model="user.email"
                        :rules="inputRules"
                        label="E-mail"
                        required
                    ></v-text-field>

                    <v-text-field
                        v-model="user.password"
                        :rules="inputPassword"
                        label="Password"
                        type="password"
                        required
                    ></v-text-field>

                    <div
                        class="d-flex justify-space-between align-center"
                    >
                        <Button @click.prevent="login">Login</Button>
                        <router-link :to="{name: 'registration'}">Not registered?</router-link>
                    </div>


                </v-col>
            </v-row>

        </v-container>
    </v-form>
</template>

<script>
export default {
    name: "Login",
    data: () => ({
        user: {
            email: '',
            password: ''
        },
        valid: false,
        inputRules: [
            v => !!v || 'Login is required',
        ],
        inputPassword: [
            v => !!v || 'Password is required'
        ]
    }),
    methods: {
        login(){
            this.$store.dispatch('loginUser', this.user);
        }
    }
}
</script>

<style scoped>

a{
    color: white;
}

</style>
