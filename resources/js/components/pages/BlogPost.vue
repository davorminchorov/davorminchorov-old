<template>
    <div class="flex flex-col justify-around">
        <div class="p-10 text-center bg-gray-300 text-gray-600" v-if="isLoading">
            <span>Loading blog post, please wait...</span>
        </div>
        <div v-else>
            <div class="gradient-green flex flex-col text-white rounded">
                <h1 class="text-center text-3xl font-bold pt-10 text-white uppercase tracking-wider">{{ post.title }}</h1>
                <h3 class="text-center text-xl font-bold pt-5 pb-10 text-white tracking-normal">by {{ post.author.name }} on {{ post.published_at }}</h3>
            </div>
            <div class="flex flex-col pt-6 pl-24 pr-24 pb-6 bg-white text-gray-900 border-2 rounded border-white">
                <vue-simple-markdown :source="post.body"></vue-simple-markdown>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                isLoading: false,
                post: {
                    id: '',
                    title: '',
                    slug: '',
                    excerpt: '',
                    body: '',
                    author: {
                        id: '', name: ''
                    },
                    published_at: ''
                },
            }
        },
        mounted() {
            this.isLoading = true;

            window.axios.get('/api/v1/posts/' + this.$route.params.slug, {
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                }
            }).then(response => {
                this.isLoading = false;

                this.post = response.data.data;
            });
        },
    }
</script>

