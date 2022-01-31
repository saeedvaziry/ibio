<template>
    <donation>
        <div class="bg-yellow-50 dark:bg-yellow-500 dark:bg-opacity-10 border-r-4 border-yellow-500 text-yellow-700 dark:text-gray-300 p-4 rounded-sm mb-5">
            <p class="leading-loose">تمامی پرداخت های کریپتو از طریق jeeb.io انجام میشه و مبالغ واریزی به کیف پول شما در jeeb.io واریز خواهد شد. بنابراین برای انتقال حمایت های دریافتی به حساب بانکیتون باید از طریق پنل کاربری jeeb.io اقدام کنید.</p>
        </div>
        <v-card class="mb-5">
            <v-title small class="mb-5">تنظیمات درگاه پرداخت</v-title>
            <div class="bg-blue-50 dark:bg-blue-500 dark:bg-opacity-10 border-r-4 border-blue-500 text-blue-700 dark:text-gray-300 p-4 rounded-sm mb-5">
                <p @click="showJeebApiHelp = true" class="cursor-pointer">راهنمای دریافت API-Key جیب</p>
                <ul class="pr-10 list-disc mt-3" :class="{'hidden': !showJeebApiHelp}">
                    <li class="mb-2">ابتدا وارد وبسایت
                        <a href="https://jeeb.io" target="_blank">jeeb.io</a>
                        بشید و ثبت نام کنید
                    </li>
                    <li class="mb-2">به بخش درگاه ها برید و بر روی درگاه جدید کلیک کنید</li>
                    <li class="mb-2">نوع درگاه رو تجاری انتخاب کنید</li>
                    <li class="mb-2">یک عنوان برای درگاهتون انتخاب کنید</li>
                    <li class="mb-2">آدرس دامنه یا سرور پذیرنده رو https://ibio.link وارد کنید</li>
                    <li class="mb-2">بر روی دکمه ایجاد درگاه کلیک کنید</li>
                    <li class="mb-2">بعد از ساخت وارد بخش API KEY ها شوید و یک عنوان وارد کرده و بر روی ساخت کلید کلیک کنید</li>
                    <li class="mb-2">کلید ساخته شده رو کپی کنید و توی فیلد زیر وارد کنید</li>
                    <li>راهنمایی بیشتر در اینجا
                        <a href="https://jeeb.io/faq" target="_blank">jeeb.io/faq</a>
                    </li>
                </ul>
            </div>
            <form @submit.prevent="updateJeebApi">
                <v-input input-class="ltr" name="name" label="API-KEY جیب" v-model="jeebApi" class="mb-4" :error="$page.props.errors.jeebApi && $page.props.errors.jeebApi.jeeb_api"></v-input>
                <v-button :loading="savingJeebApi" @click="updateJeebApi" class="mt-5">ذخیره</v-button>
            </form>
        </v-card>
        <v-card class="mb-5">
            <v-title small class="mb-5">مبالغ حمایتی</v-title>
            <p class="mb-5">گزینه مبلغ دلخواه بصورت پیشفرض از قبل وجود دارد و در صفحه حمایت نمایش داده میشود</p>
            <div class="mb-5">
                <div v-for="(amount, i) in $page.props.user.donation.amounts_usd" class="inline-flex p-2 rounded-lg items-center justify-between bg-purple-100 dark:bg-purple-500 dark:bg-opacity-10 text-purple-600 ml-2 mb-2">
                    <div class="ml-4 font-sans">${{ amount }}</div>
                    <fa-icon :icon="['fas', 'times']" class="cursor-pointer" @click="removeAmount(i)"></fa-icon>
                </div>
            </div>
            <form @submit.prevent="addAmount">
                <v-input money input-class="ltr" name="amount" label="مبلغ جدید (دلار)" v-model="amount" class="mb-4" :error="$page.props.errors.amounts && $page.props.errors.amounts.amounts"></v-input>
                <v-button :loading="savingAmounts" @click="addAmount" class="mt-5">افزودن مبلغ</v-button>
            </form>
        </v-card>
    </donation>
</template>

<script>
    export default {
        name: "CryptoGatewaySettings",
        data() {
            return {
                jeebApi: this.$page.props.user.donation.jeeb_api,
                savingJeebApi: false,
                showJeebApiHelp: true,
                amounts: [...this.$page.props.user.donation.amounts_usd],
                savingAmounts: false,
                amount: ''
            }
        },
        methods: {
            async updateJeebApi() {
                this.savingJeebApi = true;
                await this.$inertia.post(route('donation.settings.gateway-crypto.jeeb-api'), {
                    jeeb_api: this.jeebApi
                }, {
                    preserveScroll: true
                });
                this.savingJeebApi = false;
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
                await this.$inertia.post(route('donation.settings.gateway-crypto.amounts'), {
                    amounts: this.amounts
                }, {
                    preserveScroll: true
                });
                this.amount = '';
                this.savingAmounts = false;
            }
        }
    }
</script>
