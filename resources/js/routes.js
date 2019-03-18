import  Home from './components/pages/Home.vue';
import  Login from './components/pages/Login.vue';
import  NotFound from './components/pages/NotFound.vue';

export default {
    mode: 'history',
    routes: [
        {
            path: '*',
            component: NotFound,
        },
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