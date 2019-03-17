import  Home from './components/pages/Home.vue';
import  Login from './components/pages/Login.vue';

export default {
    mode: 'history',
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
}