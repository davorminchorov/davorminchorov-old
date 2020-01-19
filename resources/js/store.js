export default {
    state: {
        auth: null,
        adminPosts: [],
        blogPosts: [],
        blogPost: [],
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
                }).catch(error => {

                });
        },
        refreshToken({ commit }) {
            this.state.isLoading = true;
            return window.axios.post('/api/v1/auth/refresh', {}, {
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + this.getters.auth.access_token,
                }
            }).then(response => {
                this.state.isLoading = false;
                return commit('refreshToken', response.data);
            }).catch(error => {

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
            }).catch(error => {

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
                }).catch(error => {

                });
        },
        publishNewPost({commit}, {form}) {
            this.state.isLoading = true;
            return form.post('/admin/posts')
                .then(response => {
                    this.state.isLoading = false;
                    return response;
                }).catch(error => {

                });
        },
        updateExistingPost({commit}, {form, id}) {
            this.state.isLoading = true;
            return form.patch('/admin/posts/' + id)
                .then(response => {
                    this.state.isLoading = false;
                    return response;
                }).catch(error => {

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
            }).catch(error => {

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
            }).catch(error => {

            });
        },
        getBlogPosts({commit}) {
            this.state.isLoading = true;
            window.axios.get('/api/v1/posts', {
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                }
            }).then(response => {
                this.state.isLoading = false;
                return commit('refreshBlogPosts', response.data);
            });
        },
        getSingleBlogPost({commit}, {slug}) {
            this.state.isLoading = true;
            window.axios.get('/api/v1/posts/' + slug, {
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                }
            }).then(response => {
                this.state.isLoading = false;

                return commit('refreshSingleBlogPost', response.data);
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
        refreshToken(state, auth) {
            localStorage.setItem('auth', JSON.stringify(auth));
            state.auth = auth;
        },
        refreshAdminPosts(state, response) {
            state.adminPosts = response.data;
        },
        refreshBlogPosts(state, response) {
            state.blogPosts = response.data;
        },
        refreshSingleBlogPost(state, response) {
            state.blogPost = response.data;
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
        blogPosts(state) {
            return state.blogPosts;
        },
        blogPost(state) {
            return state.blogPost;
        },
        isLoading(state) {
            return state.isLoading;
        }
    }

}
