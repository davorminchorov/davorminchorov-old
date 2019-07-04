<template>
    <div class="flex items-center justify-center">
        <div class="bg-white p-6 max-w-xl w-full p-8 rounded-lg shadow-lg">
            <form action="#" @submit.prevent="login()" @keydown="form.errors.clear($event.target.name)">
                <h2 class="uppercase text-center text-2xl font-semibold text-gray-500 mb-4">Admin <span class="text-green-500">Login</span></h2>

                <label class="block mb-4">
                    <span class="block text-sm font-bold mb-2 uppercase">Email <span class="text-green-500">Address</span>:</span>
                    <input type="email"
                           name="email"
                           class="text-gray-900 leading-normal block w-full rounded bg-gray-200 px-4 py-2 focus:outline-none"
                           v-model="form.email"
                    >
                    <span class="w-full text-red-200 block" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></span>
                </label>

                <label class="block mb-6">
                    <span class="block text-sm font-bold mb-2 uppercase">Password:</span>
                    <input type="password"
                           name="password"
                           class="text-gray-900 leading-normal block w-full rounded bg-gray-200 px-4 py-2 focus:outline-none"
                           v-model="form.password"
                    >
                    <span class="w-full text-red-200 block" v-if="form.errors.has('password')" v-text="form.errors.get('password')"></span>
                </label>

                <div class="block mb-4 text-gray-500">
                    <google-re-captcha-v3
                            ref="captcha" v-model="form.recaptcha"
                            :id="'login'"
                            :inline="true"
                            :action="'login'"
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
                        class="w-full rounded px-4 py-2 uppercase bg-green-500 text-white text-lg leading-normal font-bold hover:bg-green-600 focus:outline-none active:bg-green-500"
                        :disabled="isLoading || form.errors.any()"
                        v-text="buttonText"
                ></button>

            </form>
        </div>
    </div>
</template>

<script>
    import {Form} from "../../Helpers/Form";
    import GoogleRecaptchaV3 from '../googlerecaptchav3/GoogleReCaptchaV3';

    export default {
        components: {
            'google-re-captcha-v3': GoogleRecaptchaV3,
        },
        data() {
            return {
                form: new Form({
                    email: '',
                    password: '',
                    recaptcha: '',
                }),
                buttonText: 'Login',
                isLoading: false,
            }
        },

        methods: {
            login() {
                this.isLoading = true;
                this.buttonText = 'Logging In...';
                this.$refs.captcha.execute();
                this.$store.dispatch('signIn', {
                    form: this.form,
                }).then((response) => {
                    this.isLoading = false;
                    this.buttonText = 'Login';
                    this.$router.push({ name: 'admin_dashboard' });
                    this.$notify({
                        group: 'notifications',
                        title: 'Success!',
                        text: 'You logged in successfully!',
                        type: 'success',
                        duration: '5000',
                    });
                })
                  .catch((error) => {
                      this.isLoading = false;
                      this.buttonText = 'Login';
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