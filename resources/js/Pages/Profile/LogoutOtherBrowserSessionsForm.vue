<template>
    <v-action-section>
        <template #title> Browser Sessions</template>

        <template #description>
            Manage and log out your active sessions on other browsers and devices.
        </template>

        <template #content>
            <div class="max-w-xl text-gray-600 dark:text-gray-400">
                If necessary, you may log out of all of your other browser sessions across all of
                your devices. Some of your recent sessions are listed below; however, this list may
                not be exhaustive. If you feel your account has been compromised, you should also
                update your password.
            </div>

            <!-- Other Browser Sessions -->
            <div class="mt-5 space-y-6" v-if="sessions.length > 0">
                <div class="flex items-center" v-for="(session, i) in sessions" :key="i">
                    <div>
                        <svg
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            class="h-8 w-8 text-gray-500 dark:text-gray-400"
                            v-if="session.agent.is_desktop"
                        >
                            <path
                                d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                            ></path>
                        </svg>

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="h-8 w-8 text-gray-500 dark:text-gray-400"
                            v-else
                        >
                            <path d="M0 0h24v24H0z" stroke="none"></path>
                            <rect x="7" y="4" width="10" height="16" rx="1"></rect>
                            <path d="M11 5h2M12 17v.01"></path>
                        </svg>
                    </div>

                    <div class="ml-3">
                        <div class="text-gray-600 dark:text-gray-400">
                            {{ session.agent.platform }} - {{ session.agent.browser }}
                        </div>

                        <div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">
                                {{ session.ip_address }},

                                <span
                                    class="font-semibold text-green-500"
                                    v-if="session.is_current_device"
                                    >This device
                                </span>
                                <span v-else>Last active {{ session.last_active }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5 flex items-center">
                <v-button @click="confirmLogout"> Log Out Other Browser Sessions</v-button>

                <v-action-message :on="form.recentlySuccessful" class="ml-3">
                    Done.
                </v-action-message>
            </div>

            <!-- Log Out Other Devices Confirmation Modal -->
            <v-dialog-modal max-width="xl" :show="confirmingLogout" @close="closeModal">
                <template #title> Log Out Other Browser Sessions</template>

                <template #content>
                    Please enter your password to confirm you would like to log out of your other
                    browser sessions across all of your devices.

                    <div class="mt-4">
                        <v-input
                            type="password"
                            class="mt-1 block w-full"
                            placeholder="Password"
                            ref="password"
                            v-model="form.password"
                            @keyup.enter="logoutOtherBrowserSessions"
                        />

                        <v-input-error :message="form.errors.password" class="mt-2" />
                    </div>
                </template>

                <template #footer>
                    <v-secondary-button @click="closeModal"> Cancel</v-secondary-button>

                    <v-button
                        class="ml-2"
                        @click="logoutOtherBrowserSessions"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Log Out Other Browser Sessions
                    </v-button>
                </template>
            </v-dialog-modal>
        </template>
    </v-action-section>
</template>

<script>
    import VActionMessage from "@/Components/ActionMessage";
    import VActionSection from "@/Components/ActionSection";
    import VButton from "@/Components/Button";
    import VDialogModal from "@/Components/DialogModal";
    import VInput from "@/Components/Input";
    import VInputError from "@/Components/InputError";
    import VSecondaryButton from "@/Components/SecondaryButton";

    export default {
        props: ["sessions"],

        components: {
            VActionMessage,
            VActionSection,
            VButton,
            VDialogModal,
            VInput,
            VInputError,
            VSecondaryButton,
        },

        data() {
            return {
                confirmingLogout: false,

                form: this.$inertia.form({
                    password: "",
                }),
            };
        },

        methods: {
            confirmLogout() {
                this.confirmingLogout = true;

                setTimeout(() => this.$refs.password.focus(), 250);
            },

            logoutOtherBrowserSessions() {
                this.form.delete(route("user.other-browser-sessions.destroy"), {
                    preserveScroll: true,
                    onSuccess: () => this.closeModal(),
                    onError: () => this.$refs.password.focus(),
                    onFinish: () => this.form.reset(),
                });
            },

            closeModal() {
                this.confirmingLogout = false;

                this.form.reset();
            },
        },
    };
</script>
