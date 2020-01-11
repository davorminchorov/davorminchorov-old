import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import axios from 'axios';
import VModal from 'vue-js-modal'
import routes from './routes';
import App from './components/App.vue';
import vuexStore from './store';
import VueSimpleMarkdown from 'vue-simple-markdown';
import 'vue-simple-markdown/dist/vue-simple-markdown.css';

Vue.use(VueRouter);
Vue.use(Vuex);
Vue.use(VModal);
Vue.use(VueSimpleMarkdown);

window.axios = axios;
Vue.config.productionTip = false;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let router = new VueRouter(routes);
let store = new Vuex.Store(vuexStore);

let auth = localStorage.getItem('auth');
store.commit('authenticate', JSON.parse(auth));

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (store.getters.auth) {
            next();
        } else {
            next({ name: 'home' });
        }
    } else if (to.matched.some(record => record.meta.requiresGuest)) {
        if (store.getters.auth) {
            next({ name: 'admin_dashboard' });
        } else {
            next();
        }
    } else {
        next();
    }
});

export default new Vue({
    el: '#app',
    router,
    store,
    render: h => h(App),
});
