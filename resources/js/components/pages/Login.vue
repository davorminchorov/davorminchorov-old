<template>
    <div class="flex items-center justify-center">
        <div class="bg-white p-6 max-w-sm w-full p-8 rounded-lg shadow-lg">
            <form method="POST" action="/login">
                <h2 class="uppercase text-center text-xl font-semibold text-grey mb-4">Admin <span class="text-green">Login</span></h2>

                <label class="block mb-4">
                    <span class="block text-sm font-bold mb-2 uppercase">Email <span class="text-green">Address</span>:</span>
                    <input type="email" class="text-black leading-normal block w-full rounded bg-grey-lighter px-4 py-2 focus:outline-none">
                </label>

                <label class="block mb-6">
                    <span class="block text-sm font-bold mb-2 uppercase">Password:</span>
                    <input type="password" class="text-black leading-normal block w-full rounded bg-grey-lighter px-4 py-2 focus:outline-none">
                </label>

                <button type="button" class="w-full rounded px-4 py-2 uppercase bg-green text-white text-lg leading-normal font-bold hover:bg-green-dark focus:outline-none active:bg-green">
                    Login
                </button>

            </form>
        </div>
    </div>
</template>

<script>
    export default {

    }
</script>