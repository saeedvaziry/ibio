<template>
    <donation>
        <v-card class="mb-5">
            <v-title small class="mb-5">تنظیمات اصلی</v-title>
            <div class="flex items-center justify-between mb-5">
                <div class="ml-10 text-sm md:text-base">فعال سازی و غیر فعال سازی حمایت مالی</div>
                <div class="flex items-center justify-end">
                    <span v-if="$page.props.user.donation.active" class="w-16 text-left">فعال</span>
                    <span v-else class="w-16 text-left">غیر فعال</span>
                    <label class="switch mr-2">
                        <input type="checkbox" v-model="$page.props.user.donation.active" @change="updateStatus">
                        <span class="slider"></span>
                    </label>
                </div>
            </div>
            <div class="flex items-center justify-between">
                <div class="ml-10 text-sm md:text-base">نمایش لیست حمایت کنندگان در صفحه حمایت مالی</div>
                <div class="flex items-center justify-end">
                    <span v-if="$page.props.user.donation.active && $page.props.user.donation.show_supporters" class="w-16 text-left">فعال</span>
                    <span v-else class="w-16 text-left">غیر فعال</span>
                    <label class="switch mr-2">
                        <input type="checkbox" v-model="$page.props.user.donation.active && $page.props.user.donation.show_supporters" @change="updateSupportersStatus">
                        <span class="slider"></span>
                    </label>
                </div>
            </div>
        </v-card>
        <v-card class="mb-5">
            <v-title small class="mb-5">متن پیام تشکر فارسی</v-title>
            <form @submit.prevent="updateThankYouMessage">
                <v-textarea name="thank_you_message" label="این پیام بعد از پرداخت موفق به حامی نمایش داده میشه" v-model="thankYouMessage" :error="$page.props.errors.thankYouMessage && $page.props.errors.thankYouMessage.text"></v-textarea>
                <v-button :loading="savingThankYouMessage" @click="updateThankYouMessage" class="mt-5">ذخیره</v-button>
            </form>
        </v-card>
        <v-card class="mb-5">
            <v-title small class="mb-5">متن پیام تشکر انگلیسی</v-title>
            <form @submit.prevent="updateThankYouMessage">
                <v-textarea ltr name="thank_you_message" label="این پیام بعد از پرداخت موفق به حامی نمایش داده میشه" v-model="thankYouMessageEn" :error="$page.props.errors.thankYouMessageEn && $page.props.errors.thankYouMessageEn.text"></v-textarea>
                <v-button :loading="savingThankYouMessageEn" @click="updateThankYouMessageEn" class="mt-5">ذخیره</v-button>
            </form>
        </v-card>
    </donation>
</template>

<script>
    export default {
        name: "DonationSettings",
        data() {
            return {
                thankYouMessage: this.$page.props.user.donation.thank_you_message,
                thankYouMessageEn: this.$page.props.user.donation.thank_you_message_en,
                savingThankYouMessage: false,
                savingThankYouMessageEn: false,
                payApi: this.$page.props.user.donation.payir_api,
                savingPayApi: false,
                showPayApiHelp: false,
                amounts: [...this.$page.props.user.donation.amounts],
                savingAmounts: false,
                amount: ''
            }
        },
        methods: {
            async updateThankYouMessage() {
                this.savingThankYouMessage = true;
                await this.$inertia.post(route('donation.settings.thank-you-message'), {
                    text: this.thankYouMessage
                }, {
                    preserveScroll: true
                });
                this.savingThankYouMessage = false;
            },
            async updateThankYouMessageEn() {
                this.savingThankYouMessageEn = true;
                await this.$inertia.post(route('donation.settings.thank-you-message-en'), {
                    text: this.thankYouMessageEn
                }, {
                    preserveScroll: true
                });
                this.savingThankYouMessageEn = false;
            },
            async updatePayApi() {
                this.savingPayApi = true;
                await this.$inertia.post(route('donation.settings.payir-api'), {
                    payir_api: this.payApi
                }, {
                    preserveScroll: true
                });
                this.savingPayApi = false;
            },
            addAmount() {
                if (this.amount && this.amount !== '') {
                    this.amounts.push(this.amount);
                    this.updateAmounts();
                }
            },
            removeAmount(index) {
                this.amounts.splice(index, 1);
                this.updateAmounts();
            },
            async updateAmounts() {
                this.savingAmounts = true;
                await this.$inertia.post(route('donation.settings.amounts'), {
                    amounts: this.amounts
                }, {
                    preserveScroll: true
                });
                this.amount = '';
                this.savingAmounts = false;
            },
            async updateStatus() {
                await this.$inertia.post(route('donation.settings.status', {status: this.$page.props.user.donation.active ? 1 : 0}));
            },
            async updateSupportersStatus() {
                await this.$inertia.post(route('donation.settings.supporters-status', {status: this.$page.props.user.donation.show_supporters ? 1 : 0}));
            }
        }
    }
</script>
