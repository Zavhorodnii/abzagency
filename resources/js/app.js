import './bootstrap';

// window.Vue = require('vue').default
// import { createApp} from "vue";
import { createApp } from 'vue/dist/vue.esm-bundler';
import router from "./router/router";
import vuetify from "./vuetify/vuetify";
import components from './views/UI';
import store from "./srore"
import LaravelVuePagination from 'laravel-vue-pagination';

const app = createApp({})

components.forEach(components => {
    (components.name, components);
});

app.component('Pagination', LaravelVuePagination)

app
    .use(router)
    .use(store)
    .use(vuetify)
    .mount('#app')
