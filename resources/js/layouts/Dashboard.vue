<template>
    <app>
        <div class="flex justify-center">
            <v-container class="flex items-start">
                <v-sidebar>
                    <v-sidebar-item :href="route('dashboard')" icon="tachometer-alt" :active="$page.props.menu === 'dashboard'">Dashboard</v-sidebar-item>
                    <v-sidebar-item :href="route('page-settings.links')" icon="link" :active="$page.props.menu === 'page-settings' && $page.props.subMenu === 'links'">Links</v-sidebar-item>
                    <v-sidebar-item :href="route('page-settings.info')" icon="address-card" :active="$page.props.menu === 'page-settings' && $page.props.subMenu !== 'links'">Page Settings</v-sidebar-item>
                    <v-sidebar-item :href="route('settings')" icon="cog" :active="$page.props.menu === 'settings'">Settings</v-sidebar-item>
                    <v-sidebar-item :href="route('stats.clicks')" icon="chart-bar" :active="$page.props.menu === 'stats'">Stats</v-sidebar-item>
                </v-sidebar>
                <div class="w-full lg:ml-6">
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
