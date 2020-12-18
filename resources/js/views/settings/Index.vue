<template>
    <dashboard>
        <v-title class="mb-5">تنظیمات حساب</v-title>
        <v-card class="mb-8">
            <v-title class="mb-5" small>تغییر کلمه عبور</v-title>
            <v-input v-if="!$page.props.user.password_not_set" type="password" label="کلمه عبور فعلی" name="current_password" v-model="password.current_password" :error="$page.props.errors.changePassword && $page.props.errors.changePassword.current_password" class="mb-3"></v-input>
            <v-input type="password" label="کلمه عبور جدید" name="password" v-model="password.password" class="mb-3" :error="$page.props.errors.changePassword && $page.props.errors.changePassword.password"></v-input>
            <v-input type="password" label="تایید کلمه عبور جدید" name="password_confirmation" v-model="password.password_confirmation" :error="$page.props.errors.changePassword && $page.props.errors.changePassword.password_confirmation"></v-input>
            <v-button :loading="submitting_password" @click="submitPassword()" class="mt-5">ذخیره</v-button>
        </v-card>
        <v-card class="mb-8">
            <v-title class="mb-5" small>ورود دو مرحله ای</v-title>
            <p class="mb-5">با فعال کردن این گزینه، موقع ورود به حساب، باید کد 6 رقمی اپلیکیشن Authenticator را نیز وارد کنید</p>
            <v-alert class="mb-3" :errors="$page.props.errors.enable2FA"></v-alert>
            <v-button type="secondary" v-if="$page.props.user.two_factor_enabled" @click="$refs.disable2FAModal.show()" class="mt-5">غیر فعال سازی</v-button>
            <v-button v-else :loading="enabling_two_factor" @click="enableTwoFactor" class="mt-5">فعال سازی</v-button>
        </v-card>
        <v-title class="mb-5">منطقه خطر</v-title>
        <v-card class="mb-5" border="border-red-200">
            <v-title class="mb-5" small>حذف حساب کاربری</v-title>
            <div class="flex items-center justify-between">
                <p class="ml-3">حساب کاربری شما بصورت کامل حذف و از دسترس عموم خارج خواهد شد و از داشبورد خارج خواهید شد</p>
                <v-button type="color" color="red" @click="$refs.deleteAccountModal.show()">حذف</v-button>
            </div>
        </v-card>
        <v-modal ref="verify2FAModal">
            <div class="p-4">
                <v-title class="mb-5" small>فعال سازی</v-title>
                <div class="mt-2">
                    <v-alert class="mb-3" :errors="$page.props.errors.verify2FA"></v-alert>
                    <p class="mb-4">کد QR زیر رو با استفاده از اپلیکیشن هایی مانند Google Authenticator یا Authy اسکن کنید و کد 6 رقمی دریافتی رو توی فیلد زیر وارد کنید
                    </p>
                    <div class="mb-4 w-full text-center">
                        <div v-html="$page.props.data.qr" class="inline-block"></div>
                    </div>
                    <v-input input-class="ltr" name="code" label="کد 6 رقمی" v-model="verify_two_factor"></v-input>
                </div>
            </div>
            <div class="px-4 py-3 flex justify-end">
                <v-button type="secondary" @click="$refs.verify2FAModal.hide()">انصراف</v-button>
                <v-button type="primary" class="mr-2" @click="verifyTwoFactor" :loading="verifying_two_factor">تایید کد</v-button>
            </div>
        </v-modal>
        <v-modal ref="disable2FAModal">
            <div class="p-4">
                <v-title class="mb-5" small>غیر فعال سازی</v-title>
                <div class="mt-2">
                    <v-alert class="mb-3" :errors="$page.props.errors.disable2FA"></v-alert>
                    <p class="mb-4">لطفا کد 6 رقمی رو از اپلیکیشن Authenticator رو دریافت و توی فیلد زیر وارد کنید</p>
                    <v-input input-class="ltr" name="code" label="کد 6 رقمی" v-model="disable_two_factor"></v-input>
                </div>
            </div>
            <div class="px-4 py-3 flex justify-end">
                <v-button type="secondary" @click="$refs.disable2FAModal.hide()">انصراف</v-button>
                <v-button type="primary" class="mr-2" @click="disableTwoFactor" :loading="disabling_two_factor">غیر فعال سازی</v-button>
            </div>
        </v-modal>
        <v-modal ref="deleteAccountModal">
            <div class="p-4">
                <v-title class="mb-5" small>حذف حساب کاربری</v-title>
                <div class="mt-2">
                    <v-alert class="mb-3" :errors="$page.props.errors.deleteAccount"></v-alert>
                    <p class="mb-4">تمامی اطلاعات شما از ibio.link حذف خواهد شد و بازگردانی آنها غیر ممکن است.</p>
                </div>
            </div>
            <div class="px-4 py-3 flex justify-end">
                <v-button type="secondary" @click="$refs.deleteAccountModal.hide()">انصراف</v-button>
                <v-button type="color" color="red" class="mr-2" @click="deleteAccount" :loading="deletingAccount">حذف</v-button>
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
