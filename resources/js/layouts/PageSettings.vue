<template>
    <dashboard>
        <v-title class="mb-5">تنظیمات صفحه من</v-title>
        <div class="mb-5">
            <v-button @click="$inertia.visit(route('page-settings.info'), {preserveScroll: true})" :type="$page.props.subMenu === 'info' ? 'secondary' : 'text'" class="inline-flex ml-2 mb-2" small>اطلاعات اصلی</v-button>
            <v-button @click="$inertia.visit(route('page-settings.links'), {preserveScroll: true})" :type="$page.props.subMenu === 'links' ? 'secondary' : 'text'" class="inline-flex ml-2 mb-2" small>لینک ها</v-button>
            <v-button @click="$inertia.visit(route('page-settings.social-media'), {preserveScroll: true})" :type="$page.props.subMenu === 'social-media' ? 'secondary' : 'text'" class="inline-flex ml-2 mb-2" small>شبکه های اجتماعی</v-button>
            <v-button @click="$inertia.visit(route('page-settings.contact'), {preserveScroll: true})" :type="$page.props.subMenu === 'contact' ? 'secondary' : 'text'" class="inline-flex ml-2 mb-2" small>اطلاعات تماس</v-button>
        </div>
        <slot></slot>
    </dashboard>
</template>

<script>
    export default {
        name: "PageSettings"
    }
</script>
