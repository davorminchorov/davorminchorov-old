export default {
    state: {
        auth: null,
        adminPosts: [],
        notification: {
            show: false,
            message: '',
            classes: '',
        },
        isLoading: false,
    },
    actions: {
        signIn({ commit }, {form}) {
            this.state.isLoading = true;
            return form.post('/auth/login')
                .then((response) => {
                    this.state.isLoading = false;
                    return commit('authenticate', response.data);
                });
        },
        signOut({ state, commit }) {
            this.state.isLoading = true;
            window.axios.post('/api/v1/auth/logout', {}, {
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + this.getters.auth.access_token,
                }
            });

            this.state.isLoading = false;

            return commit('logout');
        },
        sendContactEmail({commit}, {form}) {
            this.state.isLoading = true;
            return form.post('/admin/posts')
                .then(response => {
                    this.state.isLoading = false;
                    return response;
                });
        },
        publishNewPost({commit}, {form}) {
            this.state.isLoading = true;
            return form.post('/admin/posts')
                .then(response => {
                    this.state.isLoading = false;
                    return response;
                });
        },
        updateExistingPost({commit}, {form, id}) {
            this.state.isLoading = true;
            return form.patch('/admin/posts/' + id)
                .then(response => {
                    this.state.isLoading = false;
                    return response;
                });
        },
        deleteExistingPost({commit}, {id}) {
            this.state.isLoading = true;
            return window.axios.delete('/api/v1/admin/posts/' + id, {
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + this.getters.auth.access_token,
                }
            }).then(response => {
                this.state.isLoading = false;
                return response;
            });
        },
        getAdminBlogPosts({commit}) {
            this.state.isLoading = true;
            window.axios.get('/api/v1/admin/posts', {
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + this.getters.auth.access_token,
                }
            }).then(response => {
                this.state.isLoading = false;
                return commit('refreshAdminPosts', response.data);
            });
        }
    },

    mutations: {
        authenticate(state, auth) {
            localStorage.setItem('auth', JSON.stringify(auth));
            state.auth = auth;
        },
        logout(state) {
            localStorage.setItem('auth', null);
            state.auth = null;
        },
        refreshAdminPosts(state, response) {
            state.adminPosts = response.data;
        }
    },

    getters: {
        auth(state) {
            return state.auth;
        },
        notification(state) {
            return state.notification;
        },
        adminPosts(state) {
            return state.adminPosts;
        },
        isLoading(state) {
            return state.isLoading;
        }
    }

}
