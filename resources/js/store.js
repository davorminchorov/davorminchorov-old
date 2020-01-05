export default {
    state: {
        auth: null,
    },
    actions: {
        signIn({ commit }, {form}) {
            return form.post('/auth/login')
                .then((response) => {
                    return commit('authenticate', response.data);
                });
        },
        signOut({ state, commit }) {
            window.axios.post('/api/v1/auth/logout', {}, {
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + this.getters.auth.access_token,
                }
            });
            return commit('logout');
        },
        sendContactEmail({commit}, {form}) {
            return form.post('/contact')
                .then((response) => {
                    return response;
                });
        },
    },

    mutations: {
        authenticate(state, auth) {
            localStorage.setItem('auth', JSON.stringify(auth));
            state.auth = auth;
        },
        logout(state) {
            localStorage.setItem('auth', null);
            state.auth = null;
        }
    },

    getters: {
        auth(state) {
            return state.auth;
        },
    }

}
