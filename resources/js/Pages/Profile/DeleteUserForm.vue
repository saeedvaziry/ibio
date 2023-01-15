<template>
    <v-action-section>
        <template #title> Delete Account</template>

        <template #description> Permanently delete your account.</template>

        <template #content>
            <div class="max-w-xl text-gray-600 dark:text-gray-400">
                Once your account is deleted, all of its resources and data will be permanently
                deleted. Before deleting your account, please download any data or information that
                you wish to retain.
            </div>

            <div class="mt-5">
                <v-danger-button @click="confirmUserDeletion"> Delete Account</v-danger-button>
            </div>

            <!-- Delete Account Confirmation Modal -->
            <v-dialog-modal max-width="xl" :show="confirmingUserDeletion" @close="closeModal">
                <template #title> Delete Account</template>

                <template #content>
                    Are you sure you want to delete your account? Once your account is deleted, all
                    of its resources and data will be permanently deleted. Please enter your
                    password to confirm you would like to permanently delete your account.

                    <div class="mt-4">
                        <v-input
                            type="password"
                            class="mt-1 block w-full"
                            placeholder="Password"
                            ref="password"
                            v-model="form.password"
                            @keyup.enter="deleteUser"
                        />

                        <v-input-error :message="form.errors.password" class="mt-2" />
                    </div>
                </template>

                <template #footer>
                    <v-secondary-button @click="closeModal"> Cancel</v-secondary-button>

                    <v-danger-button
                        class="ml-2"
                        @click="deleteUser"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Delete Account
                    </v-danger-button>
                </template>
            </v-dialog-modal>
        </template>
    </v-action-section>
</template>

<script>
    import VActionSection from "@/Components/ActionSection";
    import VDialogModal from "@/Components/DialogModal";
    import VDangerButton from "@/Components/DangerButton";
    import VInput from "@/Components/Input";
    import VInputError from "@/Components/InputError";
    import VSecondaryButton from "@/Components/SecondaryButton";

    export default {
        components: {
            VActionSection,
            VDangerButton,
            VDialogModal,
            VInput,
            VInputError,
            VSecondaryButton,
        },

        data() {
            return {
                confirmingUserDeletion: false,

                form: this.$inertia.form({
                    password: "",
                }),
            };
        },

        methods: {
            confirmUserDeletion() {
                this.confirmingUserDeletion = true;

                setTimeout(() => this.$refs.password.focus(), 250);
            },

            deleteUser() {
                this.form.delete(route("user.destroy"), {
                    preserveScroll: true,
                    onSuccess: () => this.closeModal(),
                    onError: () => this.$refs.password.focus(),
                    onFinish: () => this.form.reset(),
                });
            },

            closeModal() {
                this.confirmingUserDeletion = false;

                this.form.reset();
            },
        },
    };
</script>
