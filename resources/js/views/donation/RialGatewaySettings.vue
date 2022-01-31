<template>
    <donation>
        <div class="bg-yellow-50 dark:bg-yellow-500 dark:bg-opacity-10 border-r-4 border-yellow-500 text-yellow-700 dark:text-gray-300 p-4 rounded-sm mb-5">
            <p class="leading-loose">تمامی پرداخت های ریالی از طریق pay.ir انجام میشه و مبالغ واریزی به کیف پول شما در pay.ir واریز خواهد شد. بنابراین برای انتقال حمایت های دریافتی به حساب بانکیتون باید از طریق پنل کاربری pay.ir اقدام کنید.</p>
        </div>
        <v-card class="mb-5">
            <v-title small class="mb-5">تنظیمات درگاه پرداخت</v-title>
            <div class="bg-blue-50 dark:bg-blue-500 dark:bg-opacity-10 border-r-4 border-blue-500 text-blue-700 dark:text-gray-300 p-4 rounded-sm mb-5">
                <p @click="showPayApiHelp = true" class="cursor-pointer">راهنمای دریافت API-Key شبکه پردخت پِی</p>
                <ul class="pr-10 list-disc mt-3" :class="{'hidden': !showPayApiHelp}">
                    <li class="mb-2">ابتدا وارد وبسایت
                        <a href="https://pay.ir" target="_blank">pay.ir</a>
                        بشید و ثبت نام کنید
                    </li>
                    <li class="mb-2">مدارکتون رو ارسال کنید و منتظر بمونید تا تایید بشه</li>
                    <li class="mb-2">حساب بانکیتون رو ثبت کنید و منتظر بمونید تا تایید بشه</li>
                    <li class="mb-2">درخواست درگاه بدید برای آدرس http://ibio.link و منتظر بمونید تا توسط شاپرک تایید بشه</li>
                    <li class="mb-2">بعد از تایید درگاه API-Key دریافت شده رو توی فیلد زیر وارد کنید</li>
                    <li>راهنمایی بیشتر در اینجا
                        <a href="https://pay.ir/help-center" target="_blank">pay.ir/help-center</a>
                    </li>
                </ul>
            </div>
            <form @submit.prevent="updatePayApi">
                <v-input input-class="ltr" name="name" label="API-Key شبکه پردخت پِی" v-model="payApi" class="mb-4" :error="$page.props.errors.payApi && $page.props.errors.payApi.payir_api"></v-input>
                <v-button :loading="savingPayApi" @click="updatePayApi" class="mt-5">ذخیره</v-button>
            </form>
        </v-card>
        <v-card class="mb-5">
            <v-title small class="mb-5">مبالغ حمایتی</v-title>
            <p class="mb-5">گزینه مبلغ دلخواه بصورت پیشفرض از قبل وجود دارد و در صفحه حمایت نمایش داده میشود</p>
            <div class="mb-5">
                <div v-for="(amount, i) in $page.props.user.donation.amounts" class="inline-flex p-2 rounded-lg items-center justify-between bg-purple-100 dark:bg-purple-500 dark:bg-opacity-10 text-purple-600 ml-2 mb-2">
                    <div class="ml-4">{{ amount | xmoney }} تومان</div>
                    <fa-icon :icon="['fas', 'times']" class="cursor-pointer" @click="removeAmount(i)"></fa-icon>
                </div>
            </div>
            <form @submit.prevent="addAmount">
                <v-input money input-class="ltr" name="amount" label="مبلغ جدید (تومان)" v-model="amount" class="mb-4" :error="$page.props.errors.amounts && $page.props.errors.amounts.amounts"></v-input>
                <v-button :loading="savingAmounts" @click="addAmount" class="mt-5">افزودن مبلغ</v-button>
            </form>
        </v-card>
    </donation>
</template>

<script>
    export default {
        name: "RialGatewaySettings",
        data() {
            return {
                payApi: this.$page.props.user.donation.payir_api,
                savingPayApi: false,
                showPayApiHelp: true,
                amounts: [...this.$page.props.user.donation.amounts],
                savingAmounts: false,
                amount: ''
            }
        },
        methods: {
            async updatePayApi() {
                this.savingPayApi = true;
                await this.$inertia.post(route('donation.settings.gateway-rial.payir-api'), {
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
                await this.$inertia.post(route('donation.settings.gateway-rial.amounts'), {
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
