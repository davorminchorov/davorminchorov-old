<template>
    <div>
        <div class="flex flex-col justify-around">
            <div class="gradient-green flex flex-col lg:flex-row text-white rounded">
                <dm-image></dm-image>
                <dm-info></dm-info>
            </div>
            <div class="flex flex-col lg:flex-row bg-white text-black border-2 rounded border-white">
                <div class="flex flex-col lg:w-1/2 lg:p-6 p-3">
                    <dm-about-me></dm-about-me>
                </div>
                <div class="flex flex-col lg:w-1/2 lg:p-6 p-3">
                    <dm-technology-stack></dm-technology-stack>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Image from '../Image.vue';
    import Info from '../Info.vue';
    import AboutMe from '../AboutMe';
    import TechnologyStack from '../TechnologyStack';

    export default {
        components: {
            'dm-image': Image,
            'dm-info': Info,
            'dm-about-me': AboutMe,
            'dm-technology-stack': TechnologyStack,
        },
    }
</script>