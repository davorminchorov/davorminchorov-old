<template>
    <div>
        <div class="flex flex-col justify-around">
            <div class="gradient-green flex flex-col text-white rounded">
                <h1 class="text-center text-3xl font-bold pt-10 pb-10 text-white uppercase tracking-wider">Blog Posts</h1>
            </div>
            <div class="flex flex-col pt-6 pl-24 pr-24 pb-6 bg-white text-gray-900 border-2 rounded border-white">
                <div class="flex flex-col items-end pb-6">
                    <router-link :to="{name: 'admin_new_blog_post'}" class="border-2 rounded px-4 py-2 uppercase bg-white hover:bg-green-600 text-green-600 hover:text-white border-green-600 text-lg leading-normal font-bold focus:outline-none active:bg-green-500">
                        Publish New Blog Post
                    </router-link>
                </div>
                <table class="p-10 text-center text-gray-900" v-if="posts.length">
                    <thead class="p-10 bg-green-500 text-white uppercase">
                        <th class="p-2">ID</th>
                        <th class="p-2">Title</th>
                        <th class="p-2">Published At</th>
                        <th class="p-2">Created At</th>
                        <th class="p-2">Last Updated At</th>
                        <th class="p-2" colspan="2">Actions</th>
                    </thead>
                    <tbody class="bg-gray-300">
                        <tr v-for="post in posts" :key="post.id">
                            <td class="p-2"> {{ post.id }}</td>
                            <td class="p-2">{{ post.title }}</td>
                            <td class="p-2"> {{ post.published_at }} </td>
                            <td class="p-2">{{ post.created_at }}</td>
                            <td class="p-2">{{ post.updated_at }}</td>
                            <td class="p-2">
                                <router-link :to="{name: 'admin_edit_blog_post', params: {id: post.id }}">
                                    <pencil-icon class="pr-5 icon-2x" />
                                </router-link>
                                <a href="#" @click.prevent="$modal.show('delete-confirmation')">
                                    <trash-can-icon class="pr-5 icon-2x" />
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="p-10 text-center bg-green-500 text-gray-100" v-else>
                    There are no blog posts at the moment.
                </div>
            </div>
        </div>

        <modal name="delete-confirmation" classes="bg-white rounded-lg" height="auto">
            <div class="bg-red-600 flex flex-col p-6">
                <h1 class="text-center text-2xl font-semibold uppercase text-white tracking-wider">Delete Confirmation</h1>
            </div>
            <div class="bg-white p-6">
                <p class="text-normal">Are you sure you want to delete this blog post?</p>
            </div>
            <div class="text-right p-6">
                <button class="border-2 rounded px-4 py-2 uppercase bg-white hover:bg-gray-600 text-gray-600 hover:text-white border-gray-600 text-normal leading-normal font-semibold focus:outline-none active:bg-gray-500" @click="$modal.hide('delete-confirmation')">Cancel</button>
                <button class="border-2 rounded px-4 py-2 uppercase bg-white hover:bg-red-600 text-red-600 hover:text-white border-red-600 text-normal leading-normal font-semibold focus:outline-none active:bg-red-500">Delete</button>
            </div>
        </modal>
    </div>
</template>

<script>
    import PencilIcon from 'vue-material-design-icons/Pencil.vue';
    import TrashCanIcon from 'vue-material-design-icons/TrashCan.vue';

    export default {
        components: {
            PencilIcon,
            TrashCanIcon,
        },
        data() {
            return {
                posts: [],
            }
        },
        mounted() {
            window.axios.get('/api/v1/admin/posts', {
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + this.$store.getters.auth.access_token,
                }
            }).then(response => {
                this.posts = response.data.data;
            });
        }
    }
</script>
