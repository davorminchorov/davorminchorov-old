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
                        <th class="p-2">Slug</th>
                        <th class="p-2">Published At</th>
                        <th class="p-2">Created At</th>
                        <th class="p-2">Last Updated At</th>
                        <th class="p-2" colspan="2">Actions</th>
                    </thead>
                    <tbody class="bg-gray-300">
                        <tr v-for="post in posts" :key="post.id">
                            <td class="p-2"> {{ post.id }}</td>
                            <td class="p-2">{{ post.title }}</td>
                            <td class="p-2">{{ post.slug }}</td>
                            <td class="p-2"> {{ post.published_at }} </td>
                            <td class="p-2">{{ post.created_at }}</td>
                            <td class="p-2">{{ post.updated_at }}</td>
                            <td class="p-2">
                                <router-link :to="{name: 'admin_edit_blog_post', params: {id: post.id }}">
                                    <pencil-icon class="pr-5 icon-2x" />
                                </router-link>
                                <a href="#" @click.prevent="showDeleteConfirmationModal(post.id)">
                                    <trash-can-icon class="pr-5 icon-2x" />
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="p-10 text-center bg-green-500 text-gray-100" v-else>
                    <span v-if="isLoading">Loading posts, please wait...</span>
                    <span v-else>There are no blog posts at the moment.</span>
                </div>
            </div>
        </div>

        <delete-confirmation-modal :selected-post-id="selectedPostId"></delete-confirmation-modal>
    </div>
</template>

<script>
    import PencilIcon from 'vue-material-design-icons/Pencil.vue';
    import TrashCanIcon from 'vue-material-design-icons/TrashCan.vue';
    import DeleteConfirmationModal from "../../modals/DeleteConfirmationModal.vue";

    export default {
        components: {
            PencilIcon,
            TrashCanIcon,
            DeleteConfirmationModal,
        },
        data() {
            return {
                isLoading: true,
                selectedPostId: null,
            }
        },
        computed: {
            posts() {
                return this.$store.state.adminPosts;
            }
        },
        methods: {
            showDeleteConfirmationModal(postId) {
                this.selectedPostId = postId;
                this.$modal.show('delete-confirmation');
            }
        },
        mounted() {
            this.$store.dispatch('getAdminBlogPosts').then(response => ( this.isLoading = false ));
        }
    }
</script>
