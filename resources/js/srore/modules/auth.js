import axiosInstance from "../../../axios/axios-instance";

const state = {

}

const actions = {
    loginUser({}, user, ctx) {
        console.log('loginUser vuex')
        return new Promise((resolve) => {
            axiosInstance.get('/sanctum/csrf-cookie').then(response => {
                axiosInstance.post('/api/v1/login', {
                    email: user.email,
                    password: user.password
                })
                    .then(response => {
                        if (response.data) {
                            localStorage.setItem('x-token', response.config.headers['X-XSRF-TOKEN'])
                            window.location.replace("/user/dashboard")
                            // console.log(response)
                        }
                    }) .catch((error) => {
                    console.log(error.response)
                    if (error.response.status === 422) {
                        ctx.commit('setErrors', error.response.data.errors)
                    } console.log(this.errors)
                })

            });
        });
    },

    registrationUser({}, user) {
        return new Promise((resolve) => {
            axiosInstance.get('/sanctum/csrf-cookie').then(response => {
                axiosInstance.post('/api/v1/registration', {
                    name: user.name,
                    email: user.email,
                    password: user.password,
                    password_confirmation: user.password_confirmation
                })
                    .then(response => {
                        if (response.data) {
                            localStorage.setItem('x-token', response.config.headers['X-XSRF-TOKEN'])
                            window.location.replace("/user/dashboard")
                            // console.log(response)
                        }
                    }) .catch((error) => {
                    console.log(error.response)
                })

            });
        });
    },


    logout() {
        console.log('logout')
        axiosInstance.post('/api/v1/logout')
            .then(response => {
                console.log(response)
                localStorage.removeItem('x-token')
                window.location.replace("/login")

            })
    }
}

const mutations = {

}

const getters = {

}

export default {
    namespace: true,
    state,
    actions,
    mutations,
    getters
}
