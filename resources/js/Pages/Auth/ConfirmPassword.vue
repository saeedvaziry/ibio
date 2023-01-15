<template>
    <v-authentication-card>
        <template #logo>
            <v-authentication-card-logo />
        </template>

        <div class="mb-4 text-sm text-gray-600">
            This is a secure area of the application. Please confirm your password before continuing.
        </div>

        <v-validation-errors class="mb-4" />

        <form @submit.prevent="submit">
            <div>
                <v-label for="password" value="Password" />
                <v-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" autofocus />
            </div>

            <div class="mt-5">
                <v-button :full="true" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Confirm
                </v-button>
            </div>
        </form>
    </v-authentication-card>
</template>

<script>
    import VAuthenticationCard from '@/Components/AuthenticationCard'
    import VAuthenticationCardLogo from '@/Components/AuthenticationCardLogo'
    import VButton from '@/Components/Button'
    import VInput from '@/Components/Input'
    import VLabel from '@/Components/Label'
    import VValidationErrors from '@/Components/ValidationErrors'

    export default {
        components: {
            VAuthenticationCard,
            VAuthenticationCardLogo,
            VButton,
            VInput,
            VLabel,
            VValidationErrors
        },

        data() {
            return {
                form: this.$inertia.form({
                    password: '',
                })
            }
        },

        mounted() {
            document.title = 'Confirm Password' + ' | IBio';
        },

        methods: {
            submit() {
                this.form.post(this.route('password.confirm'), {
                    onFinish: () => this.form.reset(),
                })
            }
        }
    }
</script>
