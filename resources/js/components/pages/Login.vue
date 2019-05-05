<template>
    <div class="flex items-center justify-center">
        <div class="bg-white p-6 max-w-sm w-full p-8 rounded-lg shadow-lg">
            <form action="#" @submit.prevent="login()" @keydown="form.errors.clear($event.target.name)">
                <h2 class="uppercase text-center text-xl font-semibold text-grey mb-4">Admin <span class="text-green">Login</span></h2>

                <label class="block mb-4">
                    <span class="block text-sm font-bold mb-2 uppercase">Email <span class="text-green">Address</span>:</span>
                    <input type="email"
                           name="email"
                           class="text-black leading-normal block w-full rounded bg-grey-lighter px-4 py-2 focus:outline-none"
                           v-model="form.email"
                    >
                    <span class="w-full text-red-lighter block" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></span>
                </label>

                <label class="block mb-6">
                    <span class="block text-sm font-bold mb-2 uppercase">Password:</span>
                    <input type="password"
                           name="password"
                           class="text-black leading-normal block w-full rounded bg-grey-lighter px-4 py-2 focus:outline-none"
                           v-model="form.password"
                    >
                    <span class="w-full text-red-lighter block" v-if="form.errors.has('password')" v-text="form.errors.get('password')"></span>
                </label>

                <button type="submit"
                        :class="{ 'bg-green-lightest hover:bg-green-lightest cursor-not-allowed': form.errors.any() || isLoading }"
                        class="w-full rounded px-4 py-2 uppercase bg-green text-white text-lg leading-normal font-bold hover:bg-green-dark focus:outline-none active:bg-green"
                        :disabled="isLoading || form.errors.any()"
                        v-text="buttonText"
                ></button>

            </form>
        </div>
    </div>
</template>

<script>
    import {Form} from "../../Helpers/Form";

    export default {
        data() {
            return {
                form: new Form({
                    email: '',
                    password: ''
                }),
                buttonText: 'Login',
                isLoading: false,
            }
        },

        methods: {
            login() {
                this.isLoading = true;
                this.buttonText = 'Logging In...';
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