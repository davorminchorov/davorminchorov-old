<template>
    <div class="max-w-lg w-full lg:p-10 p-6">
        <div class="bg-white p-6 p-8 rounded-lg shadow-lg">
            <form action="#" @submit.prevent="send()" @keydown="form.errors.clear($event.target.name)">
                <h2 class="uppercase text-center text-xl font-semibold text-grey mb-4">Contact <span class="text-green">Me</span></h2>

                <label class="block mb-4">
                    <span class="block text-sm font-bold mb-2 uppercase">Full <span class="text-green">Name</span>:</span>
                    <input type="name"
                           name="name"
                           class="text-black leading-normal block w-full rounded bg-grey-lighter px-4 py-2 focus:outline-none"
                           v-model="form.name"
                    >
                    <span class="w-full text-red-lighter block" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
                </label>

                <label class="block mb-4">
                    <span class="block text-sm font-bold mb-2 uppercase">Email <span class="text-green">Address</span>:</span>
                    <input type="email"
                           name="email"
                           class="text-black leading-normal block w-full rounded bg-grey-lighter px-4 py-2 focus:outline-none"
                           v-model="form.email"
                    >
                    <span class="w-full text-red-lighter block" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></span>
                </label>


                <label class="block mb-4">
                    <span class="block text-sm font-bold mb-2 uppercase">Message:</span>
                    <textarea name="message"
                              class="text-black leading-normal block w-full rounded bg-grey-lighter px-4 py-2 focus:outline-none"
                              v-model="form.message"
                              rows="5"
                    ></textarea>
                    <span class="w-full text-red-lighter block" v-if="form.errors.has('message')" v-text="form.errors.get('message')"></span>
                </label>

                <button type="submit"
                        :class="{ 'bg-green-lightest hover:bg-green-lightest cursor-not-allowed': form.errors.any() }"
                        class="w-full rounded px-4 py-2 uppercase bg-green text-white text-lg leading-normal font-bold hover:bg-green-dark focus:outline-none active:bg-green"
                        :disabled="form.errors.any()"
                >
                    Send
                </button>

            </form>
        </div>
    </div>
</template>

<script>
    import {Form} from "../Helpers/Form";

    export default {
        data() {
            return {
                form: new Form({
                    name: '',
                    email: '',
                    message: '',
                }),
            }
        },

        methods: {
            send() {
                console.log('Message sent successfully!');
            }
        }
    }
</script>