import Vue from 'vue';
import axios from 'axios';
import router from './router';
import App from './components/App.vue';

window.axios = axios;
Vue.config.productionTip = false;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

export default new Vue({
    el: '#app',
    router,
    render: h => h(App)
});
