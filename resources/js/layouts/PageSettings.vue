<template>
    <dashboard>
        <v-title class="mb-5">Page settings</v-title>
        <div class="mb-5">
            <v-button @click="$inertia.visit(route('page-settings.info'), {preserveScroll: true})" :type="$page.props.subMenu === 'info' ? 'secondary' : 'text'" class="inline-flex mr-2 mb-2" small>Info</v-button>
            <v-button @click="$inertia.visit(route('page-settings.social-media'), {preserveScroll: true})" :type="$page.props.subMenu === 'social-media' ? 'secondary' : 'text'" class="inline-flex mr-2 mb-2" small>Social Media</v-button>
            <v-button @click="$inertia.visit(route('page-settings.contact'), {preserveScroll: true})" :type="$page.props.subMenu === 'contact' ? 'secondary' : 'text'" class="inline-flex mr-2 mb-2" small>Contact Links</v-button>
            <v-button @click="$inertia.visit(route('page-settings.links'), {preserveScroll: true})" :type="$page.props.subMenu === 'links' ? 'secondary' : 'text'" class="inline-flex mr-2 mb-2" small>Custom Links</v-button>
        </div>
        <slot></slot>
    </dashboard>
</template>

<script>
    export default {
        name: "PageSettings"
    }
</script>
