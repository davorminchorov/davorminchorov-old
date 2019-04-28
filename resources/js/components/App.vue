<template>
    <div class="min-h-screen flex flex-col lg:py-10 py-3 px-3 md:px-16 lg:px-24">
        <dm-navigation></dm-navigation>

        <main class="flex-grow container mx-auto mb-10">
            <router-view></router-view>
        </main>

        <footer class="flex items-center justify-center w-full text-grey text-md">
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
