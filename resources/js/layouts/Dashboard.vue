<template>
    <app>
        <div class="flex justify-center">
            <v-container class="flex items-start">
                <v-sidebar>
                    <v-sidebar-item :href="route('dashboard')" icon="tachometer-alt" :active="$page.props.menu === 'dashboard'">داشبورد</v-sidebar-item>
                    <v-sidebar-item :href="route('donation.settings')" icon="donate" :active="$page.props.menu === 'donation'">حمایت مالی</v-sidebar-item>
                    <v-sidebar-item :href="route('page-settings.links')" icon="link" :active="$page.props.menu === 'page-settings' && $page.props.subMenu === 'links'">لینک ها</v-sidebar-item>
                    <v-sidebar-item :href="route('page-settings.info')" icon="address-card" :active="$page.props.menu === 'page-settings' && $page.props.subMenu !== 'links'">تنظیمات صفحه</v-sidebar-item>
                    <v-sidebar-item :href="route('settings')" icon="cog" :active="$page.props.menu === 'settings'">تنظیمات</v-sidebar-item>
                    <v-sidebar-item :href="route('stats.clicks')" icon="chart-bar" :active="$page.props.menu === 'stats'">آمار</v-sidebar-item>
                </v-sidebar>
                <div class="w-full lg:mr-6">
                    <slot></slot>
                </div>
            </v-container>
        </div>
    </app>
</template>

<script>
    export default {
        name: 'Dashboard'
    }
</script>
