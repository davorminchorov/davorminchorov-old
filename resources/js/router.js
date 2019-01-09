import Vue from 'vue';
import VueRouter from 'vue-router';
import  Home from './components/pages/Home.vue';

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
        }
    ],
});