<template>
    <v-form-section @submitted="updatePassword">
        <template #title> Update Password</template>

        <template #description>
            Ensure your account is using a long, random password to stay secure.
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-6">
                <v-label for="current_password" value="Current Password" />
                <v-input
                    id="current_password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.current_password"
                    ref="current_password"
                    autocomplete="current-password"
                />
                <v-input-error :message="form.errors.current_password" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-6">
                <v-label for="password" value="New Password" />
                <v-input
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    ref="password"
                    autocomplete="new-password"
                />
                <v-input-error :message="form.errors.password" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-6">
                <v-label for="password_confirmation" value="Confirm Password" />
                <v-input
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                    autocomplete="new-password"
                />
                <v-input-error :message="form.errors.password_confirmation" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <v-action-message :on="form.recentlySuccessful" class="mr-3"> Saved.</v-action-message>

            <v-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </v-button>
        </template>
    </v-form-section>
</template>

<script>
    import VActionMessage from "@/Components/ActionMessage";
    import VButton from "@/Components/Button";
    import VFormSection from "@/Components/FormSection";
    import VInput from "@/Components/Input";
    import VInputError from "@/Components/InputError";
    import VLabel from "@/Components/Label";

    export default {
        components: {
            VActionMessage,
            VButton,
            VFormSection,
            VInput,
            VInputError,
            VLabel,
        },

        data() {
            return {
                form: this.$inertia.form({
                    current_password: "",
                    password: "",
                    password_confirmation: "",
                }),
            };
        },

        methods: {
            updatePassword() {
                this.form.put(route("user-password.update"), {
                    errorBag: "updatePassword",
                    preserveScroll: true,
                    onSuccess: () => this.form.reset(),
                    onError: () => {
                        if (this.form.errors.password) {
                            this.form.reset("password", "password_confirmation");
                            this.$refs.password.focus();
                        }

                        if (this.form.errors.current_password) {
                            this.form.reset("current_password");
                            this.$refs.current_password.focus();
                        }
                    },
                });
            },
        },
    };
</script>
