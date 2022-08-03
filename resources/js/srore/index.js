import Vuex from 'vuex';
import auth from "./modules/auth";
import dashboard from "./modules/dashboard";

export default new Vuex.Store({
    modules: {
        auth,
        dashboard,
    }
})
