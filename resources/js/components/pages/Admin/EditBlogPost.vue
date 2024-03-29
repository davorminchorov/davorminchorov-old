<template>
    <div>
        <div class="flex flex-col justify-around">
            <div class="gradient-green flex flex-col text-white rounded">
                <h1 class="text-center lg:text-2xl text-xl font-bold pt-10 pb-10 text-white uppercase tracking-wider">Edit Blog Post</h1>
            </div>
            <div class="flex flex-col items-center justify-around pt-6 pl-24 pr-24 pb-6 bg-white text-gray-900 border-2 rounded border-white">
                <div class="max-w-full w-full lg:p-10 p-6">
                    <div class="bg-white p-6 p-8 rounded-lg shadow-lg">
                        <form @submit.prevent="updateExistingPost()" @keydown="form.errors.clear($event.target.name)">
                            <label class="block mb-4">
                                <span class="block text-sm font-bold mb-2 uppercase">Title:</span>
                                <input type="text"
                                       name="title"
                                       class="text-gray-900 leading-normal block w-full rounded bg-gray-100 px-4 py-2 focus:outline-none"
                                       v-model="form.title"
                                >
                                <span class="w-full text-red-300 block" v-if="form.errors.has('title')" v-text="form.errors.get('title')"></span>
                            </label>

                            <label class="block mb-4">
                                <span class="block text-sm font-bold mb-2 uppercase">Slug:</span>
                                <input type="text"
                                       name="slug"
                                       class="text-gray-900 leading-normal block w-full rounded bg-gray-100 px-4 py-2 focus:outline-none"
                                       v-model="form.slug"
                                >
                                <span class="w-full text-red-300 block" v-if="form.errors.has('slug')" v-text="form.errors.get('slug')"></span>
                            </label>

                            <label class="block mb-4">
                                <span class="block text-sm font-bold mb-2 uppercase">Excerpt:</span>
                                <textarea name="excerpt"
                                          class="text-gray-900 leading-normal block w-full rounded bg-gray-100 px-4 py-2 focus:outline-none"
                                          v-model="form.excerpt"
                                          rows="10"
                                ></textarea>
                                <span class="w-full text-red-300 block" v-if="form.errors.has('excerpt')" v-text="form.errors.get('excerpt')"></span>
                            </label>

                            <label class="block mb-4">
                                <span class="block text-sm font-bold mb-2 uppercase">Body:</span>
                                <textarea name="body"
                                          class="text-gray-900 leading-normal block w-full rounded bg-gray-100 px-4 py-2 focus:outline-none"
                                          v-model="form.body"
                                          rows="10"
                                ></textarea>
                                <span class="w-full text-red-300 block" v-if="form.errors.has('body')" v-text="form.errors.get('body')"></span>
                            </label>

                            <label class="block mb-4">
                                <span class="block text-sm font-bold mb-2 uppercase">Publish Date:</span>
                                <datetime type="datetime"
                                          v-model="form.published_at"
                                          class="datetime-theme"
                                          input-class="text-gray-900 leading-normal block w-full rounded bg-gray-100 px-4 py-2 focus:outline-none"
                                          format="DDDD TT"
                                >
                                </datetime>
                                <span class="w-full text-red-300 block" v-if="form.errors.has('published_at')" v-text="form.errors.get('published_at')"></span>
                                <span class="w-full text-gray-300 block">The current server date and time is {{ new Date().toLocaleString("en-GB", {timeZone: "UTC"}) }}</span>
                            </label>

                            <div class="mb-4 block">
                                <button type="submit"
                                        :class="{ 'opacity-50 cursor-not-allowed': form.errors.any() || isLoading }"
                                        class="block w-full rounded px-4 py-2 uppercase bg-green-500 hover:bg-green-600 text-white text-lg leading-normal font-bold focus:outline-none active:bg-green-500"
                                        :disabled="isLoading || form.errors.any()"
                                        v-text="buttonText"
                                ></button>
                            </div>

                            <div class="block mb-4">
                                <router-link :to="{name: 'admin_blog_posts'}" class="block text-center border-2 rounded px-4 py-2 uppercase bg-white hover:bg-green-600 text-green-600 hover:text-white border-green-600 text-lg leading-normal font-bold focus:outline-none active:bg-green-500">
                                    Cancel
                                </router-link>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { Form } from '../../../Helpers/Form';
    import { Datetime } from 'vue-datetime';
    import dayjs from "dayjs";

    export default {
        mounted() {
            window.axios.get('/api/v1/admin/posts/' + this.$route.params.id , {
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + this.$store.getters.auth.access_token,
                }
            }).then(response => {
                let accessToken = this.$store.getters.auth.access_token;
                this.form = new Form(response.data.data, accessToken);
                this.form.published_at = new Date(this.form.published_at).toISOString();
            }).catch(error => {

            });
        },
        components: {
            'datetime': Datetime,
        },
        data() {
            let accessToken = this.$store.getters.auth.access_token;

            return {
                form: new Form({
                    title: '',
                    slug: '',
                    body: '',
                    excerpt: '',
                    published_at: '',
                }, accessToken),
                buttonText: 'Save Changes',
            }
        },
        computed: {
            isLoading() {
                return this.$store.state.isLoading;
            }
        },
        methods: {
            updateExistingPost() {
                this.form.published_at = dayjs(this.form.published_at).format('YYYY-MM-DD HH:mm:ss');
                this.buttonText = 'Saving Changes...';
                this.$store.dispatch('updateExistingPost', {
                    form: this.form,
                    id: this.$route.params.id,
                }).then(response => {
                    this.buttonText = 'Save Changes';
                    this.$router.push({name : 'admin_blog_posts'});
                }).catch(error => {
                    this.buttonText = 'Save Changes';
                });
            }
        }
    }
</script>
