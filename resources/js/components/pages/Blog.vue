<template>
    <div class="flex flex-col justify-around">
        <div class="gradient-green flex flex-col text-white mb-4">
            <h1 class="text-center lg:text-2xl text-xl lg:font-bold font-semibold pt-10 text-white uppercase">My Blog</h1>
            <h3 class="text-center lg:text-lg text-lg lg:font-bold font-semibold pt-5 pb-10 text-white uppercase">My thoughts and experiences in the web development industry</h3>
        </div>
        <div class="flex flex-col pt-6 lg:pl-24 lg:pr-24 pl-6 pr-6 pb-6 bg-white text-gray-900">
            <div>
                <div class="lg:p-10 p-4 text-center bg-gray-300 text-gray-600" v-if="isLoading || ! posts.length">
                    <span v-if="isLoading">Loading blog posts, please wait...</span>
                    <span v-else>There are no blog posts at the moment.</span>
                </div>
                <div class="flex flex-col pb-6" v-for="post in posts" v-else>
                    <router-link :to="{name: 'single_blog_post', params: {slug: post.slug }}" class="text-center text-lg text-green-500 hover:text-green-600 font-semibold tracking-wide text-xl pb-2">{{ post.title }}</router-link>
                    <span class="text-center text-md text-gray-500 pb-2 tracking-normal"> by {{ post.author.name }} <br class="lg:hidden"> on {{ post.published_at }}
                        <span v-if="post.created_at !== post.updated_at"><br> Last update on {{ post.updated_at }} </span>
                    </span>
                    <div class="text-center text-lg tracking-normal leading-normal">
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

