import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';
import routes from './routes';
import App from './components/App.vue';

Vue.use(VueRouter);

window.axios = axios;
Vue.config.productionTip = false;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

export default new Vue({
    el: '#app',
    router: new VueRouter(routes),
    render: h => h(App)
});
