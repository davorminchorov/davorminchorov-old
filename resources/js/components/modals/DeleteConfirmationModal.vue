<template>
    <div>
        <modal name="delete-confirmation" classes="bg-white rounded-lg" height="auto">
            <div class="bg-red-600 flex flex-col p-6">
                <h1 class="text-center text-2xl font-semibold uppercase text-white tracking-wider">Delete Blog Post Confirmation</h1>
            </div>
            <div class="bg-white p-6">
                <p class="text-normal">Are you sure you want to delete this blog post?</p>
            </div>
            <div class="text-right p-6">
                <button class="border-2 rounded px-4 py-2 uppercase bg-white hover:bg-gray-600 text-gray-600 hover:text-white border-gray-600 text-normal leading-normal font-semibold focus:outline-none active:bg-gray-500" @click="$modal.hide('delete-confirmation')">Cancel</button>
                <button
                    :class="{ 'opacity-50 cursor-not-allowed': isLoading }"
                    class="border-2 rounded px-4 py-2 uppercase bg-white hover:bg-red-600 text-red-600 hover:text-white border-red-600 text-normal leading-normal font-semibold focus:outline-none active:bg-red-500"
                    @click="deleteExistingPost()"
                    :disabled="isLoading"
                    v-text="buttonText"
                >
                </button>
            </div>
        </modal>
    </div>
</template>

<script>
    export default {
        props: ['selectedPostId'],
        data() {
            return {
                buttonText: 'Delete',
            }
        },
        computed: {
            isLoading() {
                return this.$store.state.isLoading;
            }
        },
        methods: {
            deleteExistingPost() {
                this.buttonText = 'Deleting...';
                this.$store.dispatch('deleteExistingPost', {
                    id: this.selectedPostId,
                }).then(response => {
                    this.buttonText = 'Delete';
                    this.$modal.hide('delete-confirmation');
                    this.$store.dispatch('getAdminBlogPosts');
                }).catch(error => {
                    this.buttonText = 'Delete';
                    this.$modal.hide('delete-confirmation');
                });
            }
        },
    }
</script>
