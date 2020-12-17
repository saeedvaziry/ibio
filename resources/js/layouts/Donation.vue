<template>
    <dashboard>
        <div class="flex items-center justify-between mb-5">
            <v-title>حمایت مالی</v-title>
            <div class="flex items-center">
                <span v-if="$page.props.user.donation.active">فعال</span>
                <span v-else>غیر فعال</span>
                <label class="switch mr-2">
                    <input type="checkbox" v-model="$page.props.user.donation.active" @change="updateStatus">
                    <span class="slider"></span>
                </label>
            </div>
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
        name: "Donation",
        methods: {
            async updateStatus() {
                await this.$inertia.post(route('donation.settings.status', {status: this.$page.props.user.donation.active ? 1 : 0}));
            }
        }
    }
</script>
