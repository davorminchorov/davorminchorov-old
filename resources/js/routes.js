import Home from './components/pages/Home.vue';
import Login from './components/pages/Login.vue';
import NotFound from './components/pages/NotFound.vue';
import Dashboard from './components/pages/Admin/Dashboard.vue';

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
            meta: {
                requiresGuest: true,
            }
        },
        {
            path: '/admin/dashboard',
            name: 'admin_dashboard',
            component: Dashboard,
            meta: {
                requiresAuth: true,
            }
        },

    ],
}