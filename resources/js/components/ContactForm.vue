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

                <div class="block mb-4 text-grey">
                    <google-re-captcha-v3
                            ref="captcha" v-model="form.recaptcha"
                            :id="'contact'"
                            :inline="true"
                            :action="'contact'"
                            class="hidden">
                    </google-re-captcha-v3>
                    This site is protected by reCAPTCHA and the Google
                    <a href="https://policies.google.com/privacy" class="font-semibold text-green hover:text-green-dark no-underline">
                        Privacy Policy
                    </a> and
                    <a href="https://policies.google.com/terms" class="font-semibold text-green hover:text-green-dark no-underline">
                        Terms of Service
                    </a> apply.
                </div>

                <button type="submit"
                        :class="{ 'bg-green-lightest hover:bg-green-lightest cursor-not-allowed': form.errors.any() || isLoading }"
                        class="w-full rounded px-4 py-2 uppercase bg-green text-white text-lg leading-normal font-bold hover:bg-green-dark focus:outline-none active:bg-green"
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
            }
        },

        methods: {
            send() {
                this.isLoading = true;
                this.buttonText = 'Sending...';
                this.$refs.captcha.execute();
                this.$store.dispatch('sendContactEmail', {
                    form: this.form,
                }).then((response) => {
                    this.isLoading = false;
                    this.buttonText = 'Send';
                    this.$notify({
                        group: 'notifications',
                        title: 'Success!',
                        text: response.message,
                        type: 'success',
                        duration: '5000',
                    });
                }).catch((error) => {
                    this.isLoading = false;
                    this.buttonText = 'Send';
                    this.$notify({
                        group: 'notifications',
                        title: 'Error!',
                        text: error.message,
                        type: 'error',
                        duration: '5000',
                    });
                });
            }
        }
    }
</script>