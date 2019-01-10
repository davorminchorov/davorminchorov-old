<template>
    <div class="min-h-screen flex flex-col py-8 lg:py-16 px-6 md:px-16 lg:px-24">
        <div class="flex-grow">
            <router-view></router-view>
        </div>

        <div class="flex items-center justify-center w-full text-grey text-xl p-6">
            &copy; {{ (new Date()).getFullYear() }} Design by Davor Minchorov
        </div>
    </div>
</template>

<script>
    export default {

    }
</script>
