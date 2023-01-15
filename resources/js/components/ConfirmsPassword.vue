<template>
    <span>
        <span @click="startConfirmingPassword">
            <slot />
        </span>

        <v-dialog-modal :show="confirmingPassword" @close="closeModal">
            <template #title>
                {{ title }}
            </template>

            <template #content>
                {{ content }}

                <div class="mt-4">
                    <v-input
                        type="password"
                        class="mt-1 block w-full"
                        placeholder="Password"
                        ref="password"
                        v-model="form.password"
                        @keyup.enter="confirmPassword"
                    />

                    <v-input-error :message="form.error" class="mt-2" />
                </div>
            </template>

            <template #footer>
                <v-secondary-button @click="closeModal"> Cancel </v-secondary-button>

                <v-button
                    class="ml-2"
                    @click="confirmPassword"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    {{ button }}
                </v-button>
            </template>
        </v-dialog-modal>
    </span>
</template>

<script>
    import VButton from "./Button";
    import VDialogModal from "./DialogModal";
    import VInput from "./Input";
    import VInputError from "./InputError";
    import VSecondaryButton from "./SecondaryButton";

    export default {
        name: "VConfirmPassword",

        emits: ["confirmed"],

        props: {
            title: {
                default: "Confirm Password",
            },
            content: {
                default: "For your security, please confirm your password to continue.",
            },
            button: {
                default: "Confirm",
            },
        },

        components: {
            VButton,
            VDialogModal,
            VInput,
            VInputError,
            VSecondaryButton,
        },

        data() {
            return {
                confirmingPassword: false,
                form: {
                    password: "",
                    error: "",
                },
            };
        },

        methods: {
            startConfirmingPassword() {
                axios.get(route("password.confirmation")).then((response) => {
                    if (response.data.confirmed) {
                        this.$emit("confirmed");
                    } else {
                        this.confirmingPassword = true;

                        setTimeout(() => this.$refs.password.focus(), 250);
                    }
                });
            },

            confirmPassword() {
                this.form.processing = true;

                axios
                    .post(route("password.confirm"), {
                        password: this.form.password,
                    })
                    .then(() => {
                        this.form.processing = false;
                        this.closeModal();
                        this.$nextTick(() => this.$emit("confirmed"));
                    })
                    .catch((error) => {
                        this.form.processing = false;
                        this.form.error = error.response.data.errors.password[0];
                        this.$refs.password.focus();
                    });
            },

            closeModal() {
                this.confirmingPassword = false;
                this.form.password = "";
                this.form.error = "";
            },
        },
    };
</script>
