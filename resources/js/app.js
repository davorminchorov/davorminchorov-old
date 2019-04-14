import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import axios from 'axios';
import routes from './routes';
import App from './components/App.vue';
import vuexStore from './store';

Vue.use(VueRouter);
Vue.use(Vuex);

window.axios = axios;
Vue.config.productionTip = false;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let router = new VueRouter(routes);
let store = new Vuex.Store(vuexStore);

// router.beforeEach((to, from, next) => {
//     if (to.matched.some(record => record.meta.requiresAuth )) {
//         if (localStorage.getItem('access_token') === null) {
//             router.push('/login');
//         } else {
//             console.log('Auth');
//             router.push('/admin/dashboard');
//         }
//     } else if (to.matched.some(record => record.meta.guest)) {
//         if (localStorage.getItem('access_token') === null) {
//             next();
//         } else {
//             console.log('Guest');
//             router.push('/admin/dashboard');
//         }
//     }
// });

export default new Vue({
    el: '#app',
    router,
    store,
    render: h => h(App),
});
