<template>
    <dashboard>
        <div class="flex items-center justify-between mb-5">
            <v-title>حمایت مالی</v-title>
        </div>
        <div class="p-4 rounded-md mb-5 bg-red-100 text-black text-md">
            متاسفانه بدلیل مشکلات دریافت درگاه، بخش حمایت مالی آی بیو در آپدیت بعدی غیرفعال و حذف خواهد شد. برای مشاهده تراکنشها میتونید به پنل کاربریتون توی pay.ir یا jeeb.io مراجعه کنید.
        </div>
        <div class="mb-5">
            <v-button @click="$inertia.visit(route('donation.settings'), {preserveScroll: true})" :type="$page.props.subMenu === 'settings' ? 'secondary' : 'text'" class="inline-flex ml-2 mb-2" small>تنظیمات</v-button>
            <v-button @click="$inertia.visit(route('donation.settings.gateway-rial'), {preserveScroll: true})" :type="$page.props.subMenu === 'gateway-rial' ? 'secondary' : 'text'" class="inline-flex ml-2 mb-2" small>تنظیمات درگاه ریالی</v-button>
            <v-button @click="$inertia.visit(route('donation.settings.gateway-crypto'), {preserveScroll: true})" :type="$page.props.subMenu === 'gateway-crypto' ? 'secondary' : 'text'" class="inline-flex ml-2 mb-2" small>تنظیمات درگاه کریپتو<span class="text-red-500 mr-1">(آزمایشی)</span></v-button>
            <v-button @click="$inertia.visit(route('donation.supports'), {preserveScroll: true})" :type="$page.props.subMenu === 'supports' ? 'secondary' : 'text'" class="inline-flex ml-2 mb-2" small>حمایت های انجام شده</v-button>
        </div>
        <slot></slot>
    </dashboard>
</template>

<script>
    export default {
        name: "Donation"
    }
</script>
