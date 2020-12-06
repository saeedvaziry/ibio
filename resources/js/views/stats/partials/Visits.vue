<template>
    <v-card class="text-center">
        <div class="text-lg mb-3 text-gray-600">Total visits (past 7 days)</div>
        <div class="text-xl">{{ visits }}</div>
    </v-card>
</template>

<script>
    export default {
        name: "Visits",
        props: ['visits']
    }
</script>
