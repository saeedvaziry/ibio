<template>
    <dashboard>
        <div class="flex items-center justify-between mb-5">
            <v-title>حمایت مالی</v-title>
        </div>
        <div class="mb-5">
            <v-button @click="$inertia.visit(route('donation.settings'), {preserveScroll: true})" :type="$page.props.subMenu === 'settings' ? 'secondary' : 'text'" class="inline-flex ml-2 mb-2" small>تنظیمات</v-button>
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
