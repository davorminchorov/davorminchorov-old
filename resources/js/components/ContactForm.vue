<template>
    <div class="max-w-3xl w-full lg:p-10 lg:pt-0 p-6 pt-0">
        <div class="p-6 p-8 rounded-lg shadow-lg">
            <form action="#" @submit.prevent="send()" @keydown="form.errors.clear($event.target.name)">
                <h2 class="uppercase text-center text-2xl font-semibold text-gray-400 mb-4 pointer-events-none">Contact Me</h2>
                <div class="text-center font-semibold text-sm mb-4"
                     :class="{ 'text-red-300': form.errors.any(), 'text-green-400': status === 'success'}"
                     v-if="form.errors.any() || status === 'success'"
                     v-text="message">
                </div>
                <label class="block mb-4">
                    <span class="block text-sm font-bold mb-2 uppercase">Full Name:</span>
                    <input type="text"
                           name="name"
                           class="text-gray-50 leading-normal block w-full rounded bg-gray-500 px-4 py-2 focus:outline-none"
                           v-model="form.name"
                    >
                    <span class="w-full text-red-300 block" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
                </label>

                <label class="block mb-4">
                    <span class="block text-sm font-bold mb-2 uppercase">Email Address:</span>
                    <input type="email"
                           name="email"
                           class="text-gray-50 leading-normal block w-full rounded bg-gray-500 px-4 py-2 focus:outline-none"
                           v-model="form.email"
                    >
                    <span class="w-full text-red-300 block" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></span>
                </label>


                <label class="block mb-4">
                    <span class="block text-sm font-bold mb-2 uppercase">Message:</span>
                    <textarea name="message"
                              class="text-gray-50 leading-normal block w-full rounded bg-gray-500 px-4 py-2 focus:outline-none"
                              v-model="form.message"
                              rows="5"
                    ></textarea>
                    <span class="w-full text-red-300 block" v-if="form.errors.has('message')" v-text="form.errors.get('message')"></span>
                </label>

                <div class="block mb-4 text-gray-400">
                    <google-re-captcha-v3
                            ref="captcha" v-model="form.recaptcha"
                            :id="'contact'"
                            :inline="true"
                            :action="'contact'"
                            class="hidden">
                    </google-re-captcha-v3>
                    This site is protected by reCAPTCHA and the Google
                    <a href="https://policies.google.com/privacy" class="font-semibold text-green-500 hover:text-green-600 ">
                        Privacy Policy
                    </a> and
                    <a href="https://policies.google.com/terms" class="font-semibold text-green-500 hover:text-green-600 ">
                        Terms of Service
                    </a> apply.
                </div>

                <button type="submit"
                        :class="{ 'opacity-50 cursor-not-allowed': form.errors.any() || isLoading }"
                        class="w-full rounded-full px-4 py-2 uppercase bg-green-500 hover:bg-green-600 text-white text-lg leading-normal font-bold focus:outline-none active:bg-green-500"
                        :disabled="isLoading || form.errors.any()"
                        v-text="buttonText"
                >
                </button>

            </form>
        </div>
    </div>
</template>

<script>
    import {Form} from "../Helpers/Form";
    import GoogleRecaptchaV3 from './googlerecaptchav3/GoogleReCaptchaV3';

    export default {
        components: {
            'google-re-captcha-v3': GoogleRecaptchaV3,
        },
        data() {
            return {
                form: new Form({
                    name: '',
                    email: '',
                    message: '',
                    recaptcha: '',
                }),
                buttonText: 'Send',
                isLoading: false,
                message: '',
                status: '',
            }
        },

        methods: {
            send() {
                this.isLoading = true;
                this.buttonText = 'Sending...';
                this.message = '';
                this.status = '';
                this.$refs.captcha.execute();
                this.$store.dispatch('sendContactEmail', {
                    form: this.form,
                }).then((response) => {
                    this.isLoading = false;
                    this.buttonText = 'Send';
                    this.message = response.message;
                    this.status = response.status;
                }).catch((error) => {
                    this.isLoading = false;
                    this.buttonText = 'Send';
                    this.message = 'Oh oh, there were errors.';
                    this.status = 'error';
                });
            }
        }
    }
</script>
