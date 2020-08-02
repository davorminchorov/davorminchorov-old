<template>
    <div class="flex flex-col justify-around">
        <div class="gradient-green flex flex-col text-white mb-4 rounded-lg">
            <h1 class="text-center lg:text-2xl text-xl lg:font-bold font-semibold pt-10 text-white uppercase">My Blog</h1>
            <h3 class="text-center lg:text-lg text-md lg:font-bold font-semibold pt-5 pb-10 text-white uppercase">My thoughts and experiences in the web development industry</h3>
        </div>
        <div class="flex flex-col pt-6 lg:pl-24 lg:pr-24 pl-6 pr-6 pb-6 bg-white text-gray-900 rounded-lg">
            <div>
                <div class="lg:p-10 p-4 text-center bg-gray-300 text-gray-600 rounded-lg" v-if="isLoading || ! posts.length">
                    <span v-if="isLoading">Loading blog posts, please wait...</span>
                    <span v-else>There are no blog posts at the moment.</span>
                </div>
                <div class="flex flex-col pb-10" v-for="post in posts" v-else>
                    <router-link :to="{name: 'single_blog_post', params: {slug: post.slug }}" class="lg:text-2xl text-lg text-green-500 hover:text-green-600 lg:font-bold font-semibold uppercase tracking-wide pb-2">{{ post.title }}</router-link>
                    <span class="lg:text-lg text-md text-gray-500 pb-2 tracking-normal">
                        {{ post.published_at }}
                    </span>
                    <article class="prose prose-lg lg:prose-xl xl:prose-2xl" v-html="displayMarkdown(post.excerpt)"></article>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import marked from 'marked';

    export default {
        data() {
            return {}
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
            }
        },
        mounted() {
            this.$store.dispatch('getBlogPosts');
        }
    }
</script>

