<template>
    <div class="flex flex-col justify-around">
        <div class="lg:p-10 p-6 text-center bg-gray-300 text-gray-600" v-if="isLoading">
            <span>Loading blog post, please wait...</span>
        </div>
        <div v-else>
            <div class="gradient-green flex flex-col pl-6 pr-6 text-white rounded-lg">
                <h1 class="text-center lg:text-2xl text-xl lg:font-bold font-semibold pt-10 text-white uppercase tracking-wider">{{ post.title }}</h1>
                <h3 class="text-center lg:text-lg text-md lg:font-bold font-semibold pt-5 pb-10 text-white tracking-normal">by {{ post.author.name }}
                    <br class="lg:hidden"> on {{ post.published_at }}</h3>
            </div>
            <div class="flex flex-col pt-6 lg:pl-24 lg:pr-24 pl-6 pr-6 pb-6 bg-white text-gray-900 border-2 rounded-lg border-white">
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
            }).catch(error => {

            });
        },
    }
</script>

