<template>
    <div>
        <div class="flex flex-col justify-around">
            <div class="flex flex-col text-white mb-4 rounded-lg pb-6">
                <dm-image></dm-image>
            </div>
            <div class="flex flex-col items-center justify-center text-white mb-4">
                <div class="flex flex-col lg:w-3/4 lg:p-6 p-3">
                    <dm-about-me></dm-about-me>
                </div>
                <div class="flex flex-col lg:w-3/4 lg:p-6 p-3">
                    <dm-technology-stack></dm-technology-stack>
                </div>
            </div>

            <div class="flex flex-row items-center justify-center text-gray-500 rounded-lg">
                <dm-contact-form></dm-contact-form>
            </div>
        </div>
    </div>
</template>

<script>
    import Image from '../Image';
    import AboutMe from '../AboutMe';
    import TechnologyStack from '../TechnologyStack';
    import ContactForm from '../ContactForm';
    import Blog from './Blog';

    export default {
        components: {
            'dm-image': Image,
            'dm-about-me': AboutMe,
            'dm-technology-stack': TechnologyStack,
            'dm-contact-form': ContactForm,
            'dm-blog': Blog,
        },
    }
</script>
