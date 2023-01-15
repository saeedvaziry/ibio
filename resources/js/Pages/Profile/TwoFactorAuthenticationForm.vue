<template>
    <v-action-section>
        <template #title> Two Factor Authentication</template>

        <template #description>
            Add additional security to your account using two factor authentication.
        </template>

        <template #content>
            <h3
                class="text-lg font-medium text-gray-900 dark:text-gray-300"
                v-if="twoFactorEnabled"
            >
                You have enabled two factor authentication.
            </h3>

            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-300" v-else>
                You have not enabled two factor authentication.
            </h3>

            <div class="mt-3 max-w-xl text-gray-600 dark:text-gray-400">
                <p>
                    When two factor authentication is enabled, you will be prompted for a secure,
                    random token during authentication. You may retrieve this token from your
                    phone's Google Authenticator application.
                </p>
            </div>

            <div v-if="twoFactorEnabled">
                <div v-if="qrCode">
                    <div class="mt-4 max-w-xl text-gray-600 dark:text-gray-400">
                        <p class="font-semibold">
                            Two factor authentication is now enabled. Scan the following QR code
                            using your phone's authenticator application.
                        </p>
                    </div>

                    <div class="mt-4" v-html="qrCode"></div>
                </div>

                <div v-if="recoveryCodes.length > 0">
                    <div class="mt-4 max-w-xl text-gray-600 dark:text-gray-400">
                        <p class="font-semibold">
                            Store these recovery codes in a secure password manager. They can be
                            used to recover access to your account if your two factor authentication
                            device is lost.
                        </p>
                    </div>

                    <div
                        class="mt-4 grid max-w-xl gap-1 rounded-lg bg-gray-100 px-4 py-4 font-mono dark:bg-gray-700"
                    >
                        <div v-for="code in recoveryCodes" :key="code">
                            {{ code }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <div v-if="!twoFactorEnabled">
                    <v-confirms-password @confirmed="enableTwoFactorAuthentication">
                        <v-button
                            type="button"
                            :class="{ 'opacity-25': enabling }"
                            :disabled="enabling"
                        >
                            Enable
                        </v-button>
                    </v-confirms-password>
                </div>

                <div v-else>
                    <v-confirms-password @confirmed="regenerateRecoveryCodes">
                        <v-secondary-button class="mr-3" v-if="recoveryCodes.length > 0">
                            Regenerate Recovery Codes
                        </v-secondary-button>
                    </v-confirms-password>

                    <v-confirms-password @confirmed="showRecoveryCodes">
                        <v-secondary-button class="mr-3" v-if="recoveryCodes.length === 0">
                            Show Recovery Codes
                        </v-secondary-button>
                    </v-confirms-password>

                    <v-confirms-password @confirmed="disableTwoFactorAuthentication">
                        <v-danger-button :class="{ 'opacity-25': disabling }" :disabled="disabling">
                            Disable
                        </v-danger-button>
                    </v-confirms-password>
                </div>
            </div>
        </template>
    </v-action-section>
</template>

<script>
    import VActionSection from "@/Components/ActionSection";
    import VButton from "@/Components/Button";
    import VConfirmsPassword from "@/Components/ConfirmsPassword";
    import VDangerButton from "@/Components/DangerButton";
    import VSecondaryButton from "@/Components/SecondaryButton";

    export default {
        components: {
            VActionSection,
            VButton,
            VConfirmsPassword,
            VDangerButton,
            VSecondaryButton,
        },

        data() {
            return {
                enabling: false,
                disabling: false,

                qrCode: null,
                recoveryCodes: [],
            };
        },

        methods: {
            enableTwoFactorAuthentication() {
                this.enabling = true;

                this.$inertia.post(
                    "/user/two-factor-authentication",
                    {},
                    {
                        preserveScroll: true,
                        onSuccess: () => Promise.all([this.showQrCode(), this.showRecoveryCodes()]),
                        onFinish: () => (this.enabling = false),
                    }
                );
            },

            showQrCode() {
                return axios.get("/user/two-factor-qr-code").then((response) => {
                    this.qrCode = response.data.svg;
                });
            },

            showRecoveryCodes() {
                return axios.get("/user/two-factor-recovery-codes").then((response) => {
                    this.recoveryCodes = response.data;
                });
            },

            regenerateRecoveryCodes() {
                axios.post("/user/two-factor-recovery-codes").then((response) => {
                    this.showRecoveryCodes();
                });
            },

            disableTwoFactorAuthentication() {
                this.disabling = true;

                this.$inertia.delete("/user/two-factor-authentication", {
                    preserveScroll: true,
                    onSuccess: () => (this.disabling = false),
                });
            },
        },

        computed: {
            twoFactorEnabled() {
                return !this.enabling && this.$page.props.user.two_factor_enabled;
            },
        },
    };
</script>
