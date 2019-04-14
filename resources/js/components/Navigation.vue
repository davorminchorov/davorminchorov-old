<template>
    <nav class="container mx-auto lg:mb-10 mb-6 flex justify-between">
        <router-link :to="{name: 'home'}" class="no-underline text-grey text-2xl font-bold uppercase">Davor <span class="text-green">Minchorov</span></router-link>
        <a href="#"
           class="no-underline text-lg text-grey hover:text-green uppercase font-semibold tracking-wide text-xs pl-6"
            v-if="authenticated"
            @click.prevent="logout">

            Logout
        </a>
<!--        <a href="#" class="no-underline text-lg text-grey hover:text-green uppercase font-semibold tracking-wide text-xs pl-6">Articles</a>-->
<!--        <a href="#" class="no-underline text-lg text-grey hover:text-green uppercase font-semibold tracking-wide text-xs pl-6">Contact</a>-->
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