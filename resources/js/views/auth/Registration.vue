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
                        v-model="user.name"
                        :rules="inputRules"
                        label="Name"
                        required
                    ></v-text-field>

                    <v-text-field
                        v-model="user.email"
                        :rules="emailRules"
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

                    <v-text-field
                        v-model="user.password_confirmation"
                        :rules="inputPassword"
                        label="Password confirmation"
                        type="password"
                        required
                    ></v-text-field>

                    <div
                        class="d-flex justify-space-between align-center"
                    >
                        <Button @click.prevent="registration" >Registration</Button>
                        <router-link :to="{name: 'login'}">Already registered?</router-link>
                    </div>


                </v-col>
            </v-row>

        </v-container>
    </v-form>
</template>

<script>
export default {
    name: "Registration",
    data: () => ({
        user: {
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
        },
        valid: false,
        inputRules: [
            v => !!v || 'Field is required',
        ],
        inputPassword: [
            v => !!v || 'Password is required',
        ],
        emailRules: [
            v => !!v || 'E-mail is required',
            v => /.+@.+/.test(v) || 'E-mail must be valid',
        ],
    }),

    methods: {
        registration(){
            this.$store.dispatch('registrationUser', this.user);
        }
    }
}
</script>

<style scoped>
a{
    color: white;
}
</style>
