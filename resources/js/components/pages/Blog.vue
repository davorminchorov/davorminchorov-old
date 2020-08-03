<template>
    <div class="flex flex-col justify-around">
        <div class="flex flex-col text-white mb-4">
            <h1 class="text-center lg:text-3xl text-xl lg:font-bold font-semibold pt-10 text-green-300 pointer-events-none">My Blog</h1>
            <h3 class="text-center lg:text-2xl text-lg lg:font-bold font-semibold pt-5 pb-10 text-gray-500 pointer-events-none">My thoughts and experiences in the web development industry</h3>
        </div>
        <div class="flex flex-col pt-6 lg:pl-24 lg:pr-24 pl-6 pr-6 pb-6">
            <div>
                <div class="lg:p-10 p-4 text-center text-gray-300 text-lg lg:text-2xl pointer-events-none" v-if="isLoading || ! posts.length">
                    <span v-if="isLoading">Loading blog posts, please wait... <pulse-loader color="white" /></span>
                    <span v-else>There are no blog posts at the moment.</span>
                </div>
                <div class="flex flex-col pb-10" v-for="post in posts" v-else>
                    <div class="flex justify-between items-center pb-2">
                        <router-link :to="{name: 'single_blog_post', params: {slug: post.slug }}" class="lg:text-2xl text-lg text-green-300 hover:text-green-400 lg:font-bold font-semibold tracking-wide pb-2">{{ post.title }}</router-link>
                        <span class="lg:text-lg text-md text-gray-500 pb-2 tracking-normal pointer-events-none">
                            Published {{ humanPublishDate(post.published_at) }}
                        </span>
                    </div>
                    <div>
                        <article class="prose lg:prose-lg xl:prose-xl" v-html="displayMarkdown(post.excerpt)"></article>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import marked from 'marked';
    import PulseLoader from 'vue-spinner/src/PulseLoader.vue';
    import dayjs from 'dayjs';
    import relativeTime from 'dayjs/plugin/relativeTime';

    export default {
        components: {
            PulseLoader,
        },
        computed: {
            posts() {
                return this.$store.state.blogPosts;
            },
            isLoading() {
                return this.$store.state.isLoading;
            },
        },
        methods: {
            displayMarkdown(text) {
                return marked(text);
            },
            humanPublishDate(date) {
                return dayjs(date).fromNow();
            },
        },
        created() {
            dayjs.extend(relativeTime);
        },
        mounted() {
            this.$store.dispatch('getBlogPosts');
        }
    }
</script>

