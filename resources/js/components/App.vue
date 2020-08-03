<template>
    <div class="min-h-screen flex flex-col">
        <dm-navigation></dm-navigation>

        <main class="container lg:mx-auto">
            <router-view></router-view>
        </main>

        <footer class="flex items-center justify-center w-full text-gray-500 text-md lg:py-10 py-6">
            <a href="https://www.linkedin.com/in/davorminchorov" target="_blank" rel="noreferrer" class="pl-4">
                <linkedin-icon :size="48" />
            </a>
            <a href="https://github.com/davorminchorov" target="_blank" rel="noreferrer" class="pl-4">
                <github-icon :size="48" />
            </a>
            <a href="https://twitter.com/davorminchorov" target="_blank" rel="noreferrer" class="pl-4">
                <twitter-icon :size="48" />
            </a>
        </footer>

    </div>
</template>

<script>
    import Navigation from './Navigation';
    import GithubIcon from 'vue-material-design-icons/Github.vue';
    import TwitterIcon from 'vue-material-design-icons/Twitter.vue';
    import LinkedinIcon from 'vue-material-design-icons/Linkedin.vue';

    export default {
        components: {
            'dm-navigation': Navigation,
            GithubIcon,
            TwitterIcon,
            LinkedinIcon,
        },
    }
</script>
