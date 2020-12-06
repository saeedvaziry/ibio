<template>
    <v-card class="text-center">
        <div class="text-lg mb-3 text-gray-600">Total clicks (past 7 days)</div>
        <div class="text-xl">{{ clicks }}</div>
    </v-card>
</template>

<script>
    export default {
        name: "Clicks",
        props: ['clicks']
    }
</script>
