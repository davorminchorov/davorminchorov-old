<template>
    <div class="flex flex-col lg:flex-row bg-white text-black border-2 rounded border-white">
        <h1>
            Welcome!
        </h1>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                name: ''
            }
        },
        methods: {},
        mounted() {
            let accessToken = window.localStorage.getItem('access_token');

            console.log(accessToken);

        }
    }
</script>