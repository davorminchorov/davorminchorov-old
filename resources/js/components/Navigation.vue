<template>
    <nav class="container mx-auto lg:py-10 px-6 py-4 flex justify-between items-center">
        <router-link :to="{name: 'home'}" class="text-gray-400 text-2xl hover:text-green-300 font-bold uppercase">Davor Minchorov</router-link>
        <router-link :to="{name: 'admin_blog_posts'}" class="text-lg text-gray-400 hover:text-green-300 uppercase font-semibold tracking-wider text-xs pl-6" v-if="authenticated">Blog Posts</router-link>
        <router-link :to="{name: 'blog'}" class="text-lg text-gray-400 hover:text-green-300 uppercase font-semibold tracking-wider text-xs pl-6">Blog</router-link>
        <a href="#"
           class=" text-lg text-gray-400 hover:text-green-500 uppercase font-semibold tracking-wider text-xs pl-6"
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
