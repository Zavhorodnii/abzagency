
const state = {
    position_add: true,
}

const getters = {
    getPositionAdd( state ){
        return state.position_add
    }
}

const mutations = {
    hidePositionAdd( state ){
        state.position_add = false
    },
    showPositionAdd( state ){
        state.position_add = true
    }
}

const actions = {
    hidePositionAdd( { commit } ){
        commit('hidePositionAdd')
    },
    showPositionAdd( { commit } ){
        commit('showPositionAdd')
    },
}

export default {
    namespace: true,
    state,
    getters,
    mutations,
    actions
}
