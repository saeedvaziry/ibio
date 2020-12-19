<template>
    <donation>
        <v-card padding="0" v-if="payments.length > 0">
            <div class="flex items-center justify-between border-b-2 border-gray-100 p-3 md:p-6">
                <v-title small class="p-0">حمایت های اخیر</v-title>
            </div>
            <div v-for="(payment, i) in payments" :key="i" class="border-gray-100" :class="{'border-b-2': i !== payments.length - 1}">
                <div class="p-4 flex w-full items-center justify-between">
                    <div class="flex items-center">
                        <span class="ml-2">{{ payment.sender }} از</span>
                        <div class="flex items-center ml-2" v-if="payment.stat.country && payment.stat.country !== '-'">
                            <img class="h-5" :src="`/static/images/country-flags/${payment.stat.country}.svg`" alt="">
                        </div>
                        <span v-else>{{ payment.stat.country }}</span>
                    </div>
                    <div class="flex items-center">
                        {{ payment.amount }} تومان
                    </div>
                    <div class="flex items-center">
                        <v-button type="color" color="purple" small @click="$inertia.visit(route('donation.supports', {payment: payment.id, page: $page.props.payments.meta.current_page}), {preserveScroll: true, preserveState: true, only: ['payment']})">
                            <fa-icon :icon="['fas', 'eye']" class="ml-0 md:ml-2"></fa-icon>
                            <span class="hidden md:block">مشاهده جزئیات</span>
                        </v-button>
                    </div>
                </div>
                <div class="w-full bg-gray-50 px-4 py-8 text-sm md:text-md" v-if="$page.props.payment && $page.props.payment.id === payment.id">
                    <div class="flex items-center justify-between mb-4">
                        <div>تاریخ پرداخت</div>
                        <div>{{ payment.created_at }}</div>
                    </div>
                    <div class="flex items-center justify-between mb-4">
                        <div>شماره تراکنش Pay.ir</div>
                        <div>{{ payment.payment_info.transId }}</div>
                    </div>
                    <div class="flex items-center justify-between mb-4">
                        <div>پیام حامی</div>
                        <div style="max-width: 200px;">{{ payment.details.message ? payment.details.message : 'بدون پیام' }}</div>
                    </div>
                </div>
                <div class="flex items-center justify-center p-3" v-if="$page.props.payments.links.next">
                    <v-button small type="secondary" @click="loadMore" :loading="loadingMore">موارد بیشتر</v-button>
                </div>
            </div>
        </v-card>
        <v-card class="text-center" v-else>
            <p class="text-lg mb-3">هنوز هیچ حمایتی دریافت نکردی ☹️</p>
            <p class="text-gray-500 mb-3">آدرست رو با دوستات به اشتراک بذار</p>
            <v-button-copy type="secondary" small :copy-text="`ibio.link/${$page.props.user.username}`">
                <fa-icon :icon="['fas', 'link']" class="ml-1 text-gray-700"></fa-icon>
                کپی آدرس
            </v-button-copy>
        </v-card>
    </donation>
</template>

<script>
    export default {
        name: "DonationSupports",
        data() {
            return {
                payments: this.$page.props.payments.data,
                loadingMore: false
            }
        },
        methods: {
            async loadMore() {
                this.loadingMore = true;
                this.$inertia.visit(this.$page.props.payments.meta.path, {
                    method: 'get',
                    data: {
                        page: this.$page.props.payments.meta.current_page + 1
                    },
                    preserveState: true,
                    preserveScroll: true,
                    only: ['payments'],
                    replace: false,
                }).then(function () {
                    this.payments = this.$page.props.payments.data.reverse().concat(this.payments);
                    this.loadingMore = false;
                }.bind(this));
            },
        }
    }
</script>
