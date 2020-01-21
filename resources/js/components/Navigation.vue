<template>
    <nav class="container mx-auto lg:mb-10 mb-6 flex justify-between items-center">
        <router-link :to="{name: 'home'}" class="text-gray-500 text-2xl font-bold uppercase">Davor <span class="text-green-500">Minchorov</span></router-link>
        <router-link :to="{name: 'admin_blog_posts'}" class="text-lg text-gray-500 hover:text-green-500 uppercase font-semibold tracking-wider text-xs pl-6" v-if="authenticated">Blog Posts</router-link>
        <router-link :to="{name: 'blog'}" class="text-lg text-gray-500 hover:text-green-500 uppercase font-semibold tracking-wider text-xs pl-6">Blog</router-link>
        <a href="#"
           class=" text-lg text-gray-500 hover:text-green-500 uppercase font-semibold tracking-wider text-xs pl-6"
            v-if="authenticated"
            @click.prevent="logout">
            Logout
        </a>
    </nav>
</template>

<script>
 export default {
     computed: {
         authenticated() {
             return this.$store.getters.auth;
         }
     },
     methods: {
         logout () {
             this.$store.dispatch('signOut').then(() => this.$router.push({ name: 'home' }));
         }
     }
 }
</script>
