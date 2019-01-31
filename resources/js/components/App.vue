<template>
    <div class="min-h-screen flex py-10 flex-col px-6 md:px-16 lg:px-24">
        <header class="container mx-auto mb-10">
            <a href="/" class="no-underline text-grey text-2xl font-bold uppercase">Davor <span class="text-green">Minchorov</span></a>
            <!--<nav>-->
                <!--<a href="#" class="no-underline text-lg text-grey hover:text-green uppercase font-semibold tracking-wide text-xs pl-6">Resume</a>-->
                <!--<a href="#" class="no-underline text-lg text-grey hover:text-green uppercase font-semibold tracking-wide text-xs pl-6">Articles</a>-->
                <!--<a href="#" class="no-underline text-lg text-grey hover:text-green uppercase font-semibold tracking-wide text-xs pl-6">Contact</a>-->
            <!--</nav>-->
        </header>

        <main class="flex-grow container mx-auto mb-10">
            <router-view></router-view>
        </main>

        <footer class="flex items-center justify-center w-full text-grey text-md">
            &copy; {{ (new Date()).getFullYear() }} Design by Davor Minchorov
        </footer>
    </div>
</template>

<script>
    export default {

    }
</script>
