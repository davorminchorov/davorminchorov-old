<template>
    <div class="min-h-screen flex flex-col">
        <dm-navigation></dm-navigation>

        <main class="container lg:mx-auto shadow-xl">
            <router-view></router-view>
        </main>

        <footer class="flex items-center justify-center w-full text-gray-500 text-md lg:py-10 py-6">
            &copy; {{ (new Date()).getFullYear() }} Design by Davor Minchorov
        </footer>

    </div>
</template>

<script>
    import Navigation from './Navigation';

    export default {
        components: {
            'dm-navigation': Navigation
        },
    }
</script>
