<template>
    <div>
        <div class="flex flex-col justify-around">
            <div class="gradient-green flex flex-col text-white mb-4">
                <dm-image></dm-image>
                <dm-info></dm-info>
            </div>
            <div class="flex flex-col items-center justify-center bg-white text-gray-900 border-2 border-white mb-4">
                <div class="flex flex-col lg:w-3/4 lg:p-6 p-3">
                    <dm-about-me></dm-about-me>
                </div>
                <div class="flex flex-col lg:w-3/4 lg:p-6 p-3">
                    <dm-technology-stack></dm-technology-stack>
                </div>
            </div>

            <div class="flex flex-row items-center justify-center gradient-green text-gray-500">
                <dm-contact-form></dm-contact-form>
            </div>
        </div>
    </div>
</template>

<script>
    import Image from '../Image';
    import Info from '../Info';
    import AboutMe from '../AboutMe';
    import TechnologyStack from '../TechnologyStack';
    import ContactForm from '../ContactForm';

    export default {
        components: {
            'dm-image': Image,
            'dm-info': Info,
            'dm-about-me': AboutMe,
            'dm-technology-stack': TechnologyStack,
            'dm-contact-form': ContactForm,
        },
    }
</script>
