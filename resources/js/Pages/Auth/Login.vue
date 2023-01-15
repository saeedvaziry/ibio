<template>
    <v-authentication-card>
        <template #logo>
            <v-authentication-card-logo />
        </template>

        <v-validation-errors class="mb-4" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <v-label for="email" value="Email" />
                <v-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus />
            </div>

            <div class="mt-4">
                <v-label for="password" value="Password" />
                <v-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" />
            </div>

            <div class="flex items-center justify-between mt-4">
                <label class="flex items-center">
                    <v-checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
                <inertia-link :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Forgot your password?
                </inertia-link>
            </div>

            <div class="mt-5">
                <v-button :full="true" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </v-button>
            </div>

            <div class="text-center mt-4">
                <inertia-link :href="route('register')" class="underline text-sm text-gray-600 hover:text-gray-900">Don't have an account?</inertia-link>
            </div>
        </form>

        <template #footer>
            <social />
        </template>
    </v-authentication-card>
</template>

<script>
    import VAuthenticationCard from '@/Components/AuthenticationCard'
    import VAuthenticationCardLogo from '@/Components/AuthenticationCardLogo'
    import VButton from '@/Components/Button'
    import VInput from '@/Components/Input'
    import VCheckbox from '@/Components/Checkbox'
    import VLabel from '@/Components/Label'
    import VValidationErrors from '@/Components/ValidationErrors'
    import Social from "@/Pages/Auth/Social";

    export default {
        components: {
            Social,
            VAuthenticationCard,
            VAuthenticationCardLogo,
            VButton,
            VInput,
            VCheckbox,
            VLabel,
            VValidationErrors
        },

        props: {
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false
                })
            }
        },

        mounted() {
            document.title = 'Login' + ' | IBio';
        },

        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ...data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(this.route('login'), {
                        onFinish: () => this.form.reset('password'),
                    })
            }
        }
    }
</script>
