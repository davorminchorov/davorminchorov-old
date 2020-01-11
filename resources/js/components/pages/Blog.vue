<template>
    <div class="flex flex-col justify-around">
        <div class="gradient-green flex flex-col text-white rounded">
            <h1 class="text-center text-3xl font-bold pt-10 text-white uppercase">My Blog</h1>
            <h3 class="text-center text-xl font-bold pt-5 pb-10 text-white uppercase">My thoughts and experiences in the web development industry</h3>
        </div>
        <div class="flex flex-col pt-6 pl-24 pr-24 pb-6 bg-white text-gray-900 border-2 rounded border-white">
            <div>
                <div class="p-10 text-center bg-gray-300 text-gray-600" v-if="isLoading || ! posts.length">
                    <span v-if="isLoading">Loading blog posts, please wait...</span>
                    <span v-else>There are no blog posts at the moment.</span>
                </div>
                <div class="flex flex-col pb-6" v-for="post in posts" v-else>
                    <router-link :to="{name: 'single_blog_post', params: {slug: post.slug }}" class="text-center text-lg text-green-500 hover:text-green-600 font-semibold tracking-wider text-xl pb-2">{{ post.title }}</router-link>
                    <span class="text-center text-md text-gray-500 pb-2 tracking-normal"> by Davor Minchorov on {{ post.published_at }}</span>
                    <div class="text-center">
                        <vue-simple-markdown :source="post.excerpt"></vue-simple-markdown>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
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
            }
        },
        mounted() {
            this.$store.dispatch('getBlogPosts');
        }
    }
</script>

