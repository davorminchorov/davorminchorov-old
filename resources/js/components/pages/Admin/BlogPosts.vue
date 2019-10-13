<template>
    <div>
        <div class="flex flex-col justify-around">
            <div class="gradient-green flex flex-col text-white rounded">
                <h1 class="text-center text-3xl font-bold pt-10 pb-10 text-white uppercase tracking-wider">Blog Posts</h1>
            </div>
            <div class="flex flex-col pt-6 pl-24 pr-24 pb-6 bg-white text-gray-900 border-2 rounded border-white">
                <table class="p-10 text-center text-gray-900">
                    <thead class="p-10 bg-green-500 text-white uppercase">
                        <th class="p-2">ID</th>
                        <th class="p-2">Title</th>
                        <th class="p-2">Published At</th>
                        <th class="p-2">Created At</th>
                        <th class="p-2">Last Updated At</th>
                        <th class="p-2" colspan="2">Actions</th>
                    </thead>
                    <tbody class="bg-gray-300">
                        <tr>
                            <td class="p-2">1</td>
                            <td class="p-2">Welcome To My Blog</td>
                            <td class="p-2">October 13, 2019</td>
                            <td class="p-2">October 13, 2019</td>
                            <td class="p-2">October 13, 2019</td>
                            <td class="p-2">
                                <a href="#">
                                    <pencil-icon class="pr-5 icon-2x" />
                                </a>
                                <a href="#">
                                    <trash-can-icon class="pr-5 icon-2x" />
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-2">2</td>
                            <td class="p-2">Another blog title here</td>
                            <td class="p-2">October 13, 2019</td>
                            <td class="p-2">October 13, 2019</td>
                            <td class="p-2">October 13, 2019</td>
                            <td class="p-2">
                                <a href="#">
                                    <pencil-icon class="pr-5 icon-2x" />
                                </a>
                                <a href="#">
                                    <trash-can-icon class="pr-5 icon-2x" />
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</template>

<script>
    import PencilIcon from 'vue-material-design-icons/Pencil.vue';
    import TrashCanIcon from 'vue-material-design-icons/TrashCan.vue';

    export default {
        components: {
            PencilIcon,
            TrashCanIcon
        }
    }
</script>
