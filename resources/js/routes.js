import Home from './components/pages/Home.vue';
import Blog from './components/pages/Blog.vue';
import BlogPost from './components/pages/BlogPost.vue';
import Login from './components/pages/Login.vue';
import NotFound from './components/pages/NotFound.vue';
import Dashboard from './components/pages/Admin/Dashboard.vue';
import BlogPosts from './components/pages/Admin/BlogPosts.vue';
import NewBlogPost from './components/pages/Admin/NewBlogPost.vue';
import EditBlogPost from "./components/pages/Admin/EditBlogPost";

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
            path: '/blog',
            name: 'blog',
            component: Blog,
        },
        {
            path: '/blog/:slug',
            name: 'single_blog_post',
            component: BlogPost,
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
        {
            path: '/admin/posts',
            name: 'admin_blog_posts',
            component: BlogPosts,
            meta: {
                requiresAuth: true,
            }
        },
        {
            path: '/admin/posts/new',
            name: 'admin_new_blog_post',
            component: NewBlogPost,
            meta: {
                requiresAuth: true,
            }
        },
        {
            path: '/admin/posts/:id/edit',
            name: 'admin_edit_blog_post',
            component: EditBlogPost,
            meta: {
                requiresAuth: true,
            }
        },
    ],
}
