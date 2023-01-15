<template>
    <v-authentication-card>
        <template #logo>
            <v-authentication-card-logo />
        </template>

        <v-validation-errors class="mb-4" />

        <form @submit.prevent="submit">
            <div>
                <v-label for="name" value="Name" />
                <v-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <v-label for="email" value="Email" />
                <v-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required />
            </div>

            <div class="mt-4">
                <v-label for="password" value="Password" />
                <v-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <v-label for="password_confirmation" value="Confirm Password" />
                <v-input id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <v-label for="terms">
                    <div class="flex items-center">
                        <v-checkbox name="terms" id="terms" v-model:checked="form.terms" />

                        <div class="ml-2">
                            I agree to the
                            <a target="_blank" :href="route('terms')" class="underline text-sm text-gray-600 hover:text-gray-900">Terms of Service</a>
                            and
                            <a target="_blank" :href="route('policy')" class="underline text-sm text-gray-600 hover:text-gray-900">Privacy Policy</a>
                        </div>
                    </div>
                </v-label>
            </div>

            <div class="mt-5">
                <v-button :full="true" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </v-button>
            </div>

            <div class="mt-4 text-center">
                <inertia-link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Already registered?
                </inertia-link>
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
    import VCheckbox from "@/Components/Checkbox";
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

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    terms: false,
                })
            }
        },

        mounted() {
            document.title = 'Register' + ' | IBio';
        },

        methods: {
            submit() {
                this.form.post(this.route('register'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            }
        }
    }
</script>
