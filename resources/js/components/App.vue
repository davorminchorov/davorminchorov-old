<template>
    <div class="min-h-screen flex flex-col lg:py-10 py-3">
        <dm-navigation></dm-navigation>

        <main class="mb-10 container lg:mx-auto shadow-xl rounded-lg">
            <router-view></router-view>
        </main>

        <footer class="flex items-center justify-center w-full text-gray-500 text-md">
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
