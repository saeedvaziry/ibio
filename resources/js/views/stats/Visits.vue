<template>
    <stats>
        <div class="grid grid-cols-1 mb-5">
            <v-card class="pie-chart w-full mb-3 sm:mb-0">
                <v-title small class="mb-3">Visits by device</v-title>
                <visits-by-device :chart-data="$page.props.visitsByDevice"></visits-by-device>
            </v-card>
        </div>
    </stats>
</template>

<script>
    import VisitsByDevice from "@/views/stats/partials/VisitsByDevice";

    export default {
        name: "Visits",
        components: {VisitsByDevice}
    }
</script>
