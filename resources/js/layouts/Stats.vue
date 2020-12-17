<template>
    <dashboard>
        <v-title class="mb-5">آمار</v-title>
        <div class="mb-5">
            <v-button @click="$inertia.visit(route('stats.clicks'), {preserveScroll: true})" :type="$page.props.subMenu === 'clicks' ? 'secondary' : 'text'" class="inline-flex ml-2 mb-2" small>کلیک ها</v-button>
            <v-button @click="$inertia.visit(route('stats.visits'), {preserveScroll: true})" :type="$page.props.subMenu === 'visits' ? 'secondary' : 'text'" class="inline-flex ml-2 mb-2" small>بازدید ها</v-button>
        </div>
        <slot></slot>
    </dashboard>
</template>

<script>
    export default {
        name: "Stats"
    }
</script>
