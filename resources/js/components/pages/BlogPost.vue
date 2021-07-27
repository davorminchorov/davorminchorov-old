<template>
    <div class="flex flex-col justify-around">
        <div class="lg:p-10 p-6 text-center text-gray-200 text-lg lg:text-2xl pointer-events-none" v-if="isLoading">
            <span>Loading blog post, please wait... <pulse-loader color="white" /></span>
        </div>
        <div v-else>
            <div class="flex flex-col pl-6 pr-6 text-gray-200 mb-4">
                <h1 class="text-center lg:text-3xl text-xl lg:font-bold font-semibold pt-10 text-green-300 tracking-wider pointer-events-none">{{ post.title }}</h1>
                <h3 class="text-center lg:text-2xl text-lg lg:font-bold font-semibold pt-5 pb-10 text-gray-400 tracking-normal pointer-events-none">
                    Published {{ humanPublishDate }}
                </h3>
            </div>
            <div class="lg:pl-32 lg:pr-32 p-6">
                <article class="prose lg:prose-lg xl:prose-xl" v-html="displayMarkdown"></article>
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
                        id: '',
                        name: '',
                    },
                    published_at: '',
                    created_at: '',
                    updated_at: '',
                },
            }
        },
        computed: {
            displayMarkdown() {
                return marked(this.post.body);
            },
            humanPublishDate() {
                return dayjs(this.post.published_at).fromNow();
            },
        },
        created() {
            dayjs.extend(relativeTime);
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
                if (error.response.status === 404) {
                    this.$router.push({ name: 'blog' });
                }
            });
        },
    }
</script>

