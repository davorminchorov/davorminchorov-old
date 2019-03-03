import Vue from 'vue';
import VueRouter from 'vue-router';
import  Home from './components/pages/Home.vue';
import  Login from './components/pages/Login.vue';

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
        },
        {
            path: '/login',
            name: 'login',
            component: Login,
        }
    ],
});