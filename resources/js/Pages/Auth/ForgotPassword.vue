<template>
    <v-authentication-card>
        <template #logo>
            <v-authentication-card-logo />
        </template>

        <div class="mb-4 text-sm text-gray-600">
            Forgot your password? No problem. Just let us know your email address and we will email you a password reset
            link that will allow you to choose a new one.
        </div>

        <div v-if="success" class="mb-4 font-medium text-sm text-green-600">
            Password reset email sent!
        </div>

        <v-validation-errors class="mb-4" />

        <form @submit.prevent="submit">
            <div>
                <v-label for="email" value="Email" />
                <v-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus />
            </div>

            <div class="mt-5">
                <v-button :full="true" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Email Password Reset Link
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

        props: {
            status: String
        },

        data() {
            return {
                success: false,
                form: this.$inertia.form({
                    email: ''
                })
            }
        },

        mounted() {
            document.title = 'Forgot Password' + ' | IBio';
        },

        methods: {
            submit() {
                this.success = false;
                this.form.post(this.route('password.email'), {
                    onSuccess: () => {
                        this.success = true;
                    },
                })
            }
        }
    }
</script>
