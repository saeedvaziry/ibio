<template>
    <dashboard>
        <v-title class="mb-5">Settings</v-title>
        <v-card class="mb-8">
            <v-title class="mb-5" small>Password</v-title>
            <v-input v-if="!$page.props.user.password_not_set" type="password" label="Current Password" name="current_password" v-model="password.current_password" :error="$page.props.errors.changePassword && $page.props.errors.changePassword.current_password" class="mb-3"></v-input>
            <v-input type="password" label="New Password" name="password" v-model="password.password" class="mb-3" :error="$page.props.errors.changePassword && $page.props.errors.changePassword.password"></v-input>
            <v-input type="password" label="Confirm Password" name="password_confirmation" v-model="password.password_confirmation" :error="$page.props.errors.changePassword && $page.props.errors.changePassword.password_confirmation"></v-input>
            <v-button :loading="submitting_password" @click="submitPassword()" class="mt-5">Save</v-button>
        </v-card>
        <v-card class="mb-8">
            <v-title class="mb-5" small>Two factor authentication</v-title>
            <p class="mb-5">By enabling this, We'll ask you the 6 digits validation code (from your authenticator app) at any login attempts.</p>
            <v-alert class="mb-3" :errors="$page.props.errors.enable2FA"></v-alert>
            <v-button type="secondary" v-if="$page.props.user.two_factor_enabled" @click="$refs.disable2FAModal.show()" class="mt-5">Disable</v-button>
            <v-button v-else :loading="enabling_two_factor" @click="enableTwoFactor" class="mt-5">Enable</v-button>
        </v-card>
        <v-title class="mb-5">Danger zone</v-title>
        <v-card class="mb-5" border="border-red-200">
            <v-title class="mb-5" small>Delete account</v-title>
            <div class="flex items-center justify-between">
                <p class="mr-3">Your account will be temporarily deactivated and will not be accessible publicly. You will be logged out in the process, and the page will be re-activated when you login again.</p>
                <v-button type="color" color="red" @click="$refs.deleteAccountModal.show()">Delete</v-button>
            </div>
        </v-card>
        <v-modal ref="verify2FAModal">
            <div class="p-4">
                <v-title class="mb-5" small>Verify</v-title>
                <div class="mt-2">
                    <v-alert class="mb-3" :errors="$page.props.errors.verify2FA"></v-alert>
                    <p class="mb-4">Scan the below QR code with an authenticator app like
                        <a href="#" class="text-primary-500">Google Authenticator</a>
                        or
                        <a href="#" class="text-primary-500">Authy</a>
                        and enter the 6 digits code bellow to verify.
                    </p>
                    <p class="mb-4">Verification process will expire after 5 minutes.</p>
                    <div class="mb-4 w-full text-center">
                        <div v-html="$page.props.data.qr" class="inline-block"></div>
                    </div>
                    <v-input name="code" label="6 digits code" v-model="verify_two_factor"></v-input>
                </div>
            </div>
            <div class="px-4 py-3 flex justify-end">
                <v-button type="secondary" @click="$refs.verify2FAModal.hide()">Cancel</v-button>
                <v-button type="primary" class="ml-2" @click="verifyTwoFactor" :loading="verifying_two_factor">Verify</v-button>
            </div>
        </v-modal>
        <v-modal ref="disable2FAModal">
            <div class="p-4">
                <v-title class="mb-5" small>Disable</v-title>
                <div class="mt-2">
                    <v-alert class="mb-3" :errors="$page.props.errors.disable2FA"></v-alert>
                    <p class="mb-4">Please enter the code from your authenticator app</p>
                    <v-input name="code" label="6 digits code" v-model="disable_two_factor"></v-input>
                </div>
            </div>
            <div class="px-4 py-3 flex justify-end">
                <v-button type="secondary" @click="$refs.disable2FAModal.hide()">Cancel</v-button>
                <v-button type="primary" class="ml-2" @click="disableTwoFactor" :loading="disabling_two_factor">Disable</v-button>
            </div>
        </v-modal>
        <v-modal ref="deleteAccountModal">
            <div class="p-4">
                <v-title class="mb-5" small>Delete account</v-title>
                <div class="mt-2">
                    <v-alert class="mb-3" :errors="$page.props.errors.deleteAccount"></v-alert>
                    <p class="mb-4">All of your account data will be deleted completely and it is impossible to restore it.</p>
                </div>
            </div>
            <div class="px-4 py-3 flex justify-end">
                <v-button type="secondary" @click="$refs.deleteAccountModal.hide()">Cancel</v-button>
                <v-button type="color" color="red" class="ml-2" @click="deleteAccount" :loading="deletingAccount">Delete</v-button>
            </div>
        </v-modal>
    </dashboard>
</template>

<script>
    export default {
        name: 'Settings',
        data() {
            return {
                password: {
                    current_password: '',
                    password: '',
                    password_confirmation: '',
                },
                submitting_password: false,
                enabling_two_factor: false,
                verifying_two_factor: false,
                verify_two_factor: '',
                disabling_two_factor: false,
                disable_two_factor: '',
                deletingAccount: false
            }
        },
        methods: {
            async submitPassword() {
                this.submitting_password = true;
                await this.$inertia.post(route('settings.password'), this.password, {
                    preserveScroll: true,
                });
                this.submitting_password = false;
            },
            async enableTwoFactor() {
                this.enabling_two_factor = true;
                await this.$inertia.post(route('settings.2fa.enable'), {}, {
                    preserveScroll: true,
                });
                this.$refs.verify2FAModal.show();
                this.enabling_two_factor = false;
            },
            async verifyTwoFactor() {
                this.verifying_two_factor = true;
                await this.$inertia.post(route('settings.2fa.verify'), {
                    code: this.verify_two_factor
                }, {
                    preserveScroll: true,
                });
                if (this.$page.props.flash.success) {
                    this.$refs.verify2FAModal.hide();
                }
                this.verifying_two_factor = false;
            },
            async disableTwoFactor() {
                this.disabling_two_factor = true;
                await this.$inertia.post(route('settings.2fa.disable'), {
                    code: this.disable_two_factor
                }, {
                    preserveScroll: true,
                });
                if (this.$page.props.flash.success) {
                    this.$refs.disable2FAModal.hide();
                }
                this.disabling_two_factor = false;
            },
            async deleteAccount() {
                this.deletingAccount = true;
                this.$inertia.visit(route('settings'), {
                    method: 'delete',
                    preserveState: true,
                    only: []
                }).then(function () {
                    window.location.href = '/login';
                });
            }
        }
    }
</script>
