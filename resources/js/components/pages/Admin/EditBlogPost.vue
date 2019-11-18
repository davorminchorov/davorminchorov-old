<template>
    <div>
        <div class="flex flex-col justify-around">
            <div class="gradient-green flex flex-col text-white rounded">
                <h1 class="text-center text-3xl font-bold pt-10 pb-10 text-white uppercase tracking-wider">Edit Blog Post</h1>
            </div>
            <div class="flex flex-col items-center justify-around pt-6 pl-24 pr-24 pb-6 bg-white text-gray-900 border-2 rounded border-white">
                <div class="max-w-full w-full lg:p-10 p-6">
                    <div class="bg-white p-6 p-8 rounded-lg shadow-lg">
                        <form @submit.prevent="publish()" @keydown="form.errors.clear($event.target.name)">
                            <div class="text-center font-semibold text-sm mb-4"
                                 :class="{ 'text-red-400': form.errors.any(), 'text-green-400': status === 'success'}"
                                 v-if="form.errors.any() || status === 'success'"
                                 v-text="message"
                            >
                            </div>
                            <label class="block mb-4">
                                <span class="block text-sm font-bold mb-2 uppercase">Title:</span>
                                <input type="text"
                                       name="title"
                                       class="text-gray-900 leading-normal block w-full rounded bg-gray-200 px-4 py-2 focus:outline-none"
                                       v-model="form.title"
                                >
                                <span class="w-full text-red-400 block" v-if="form.errors.has('title')" v-text="form.errors.get('title')"></span>
                            </label>

                            <label class="block mb-4">
                                <span class="block text-sm font-bold mb-2 uppercase">Slug:</span>
                                <input type="text"
                                       name="slug"
                                       class="text-gray-900 leading-normal block w-full rounded bg-gray-200 px-4 py-2 focus:outline-none"
                                       v-model="form.slug"
                                >
                                <span class="w-full text-red-400 block" v-if="form.errors.has('slug')" v-text="form.errors.get('slug')"></span>
                            </label>

                            <label class="block mb-4">
                                <span class="block text-sm font-bold mb-2 uppercase">Excerpt:</span>
                                <editor v-model="form.excerpt" previewStyle="vertical" height="300px" />
                                <span class="w-full text-red-400 block" v-if="form.errors.has('excerpt')" v-text="form.errors.get('excerpt')"></span>
                            </label>

                            <label class="block mb-4">
                                <span class="block text-sm font-bold mb-2 uppercase">Body:</span>
                                <editor v-model="form.body" previewStyle="vertical" height="300px" />
                                <span class="w-full text-red-400 block" v-if="form.errors.has('body')" v-text="form.errors.get('body')"></span>
                            </label>

                            <label class="block mb-4">
                                <span class="block text-sm font-bold mb-2 uppercase">Publish Date:</span>
                                <datetime type="datetime"
                                          v-model="form.published_at"
                                          class="datetime-theme"
                                          input-class="text-gray-900 leading-normal block w-full rounded bg-gray-200 px-4 py-2 focus:outline-none"
                                          format="DDDD TT"
                                >
                                </datetime>
                                <span class="w-full text-red-400 block" v-if="form.errors.has('published_at')" v-text="form.errors.get('published_at')"></span>
                                <span class="w-full text-gray-400 block">The current server date and time is {{ new Date().toLocaleString("en-GB", {timeZone: "UTC"}) }}</span>
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
    import 'tui-editor/dist/tui-editor.css';
    import 'tui-editor/dist/tui-editor-contents.css';
    import 'codemirror/lib/codemirror.css';
    import 'vue-datetime/dist/vue-datetime.css';

    import {Form} from '../../../Helpers/Form';
    import { Datetime } from 'vue-datetime';
    import { Editor } from '@toast-ui/vue-editor';

    export default {
        mounted() {
            Editor.usageStatistics = false;
        },
        components: {
            'editor': Editor,
            'datetime': Datetime,
        },
        data() {
            return {
                form: new Form({
                    title: 'test',
                    body: 'some body content',
                    excerpt: 'some excerpt content',
                    slug: 'test',
                    published_at: '2019-11-22T09:41:00.000Z',
                }),
                message: '',
                status: '',
                buttonText: 'Save Changes',
                isLoading: false,
            }
        },

        methods: {
            publish() {
                this.isLoading = true;
                this.buttonText = 'Saving...';
                this.excerpt = '';
                this.body = '';
                this.status = '';
                // this.$store.dispatch('PublishNewBlogPost', {
                //     form: this.form,
                // }).then((response) => {
                //     this.isLoading = false;
                //     this.buttonText = 'Save Changes';
                //     this.message = response.message;
                //     this.status = response.status;
                // }).catch((error) => {
                //     this.isLoading = false;
                //     this.buttonText = 'Save Changes';
                //     this.message = 'Oh oh, there were errors.';
                //     this.status = 'error';
                // });
            }
        }
    }
</script>
