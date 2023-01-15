<template>
    <app-layout>
        <v-container>
            <v-section-title>
                <template #title>Visits</template>
                <template #description>
                    This chart shows how many times your page has been visited
                </template>
            </v-section-title>
            <visits class="mt-5"/>
        </v-container>
    </app-layout>
</template>

<script>
    import AppLayout from "@/Layouts/AppLayout";
    import VContainer from "@/Components/Container";
    import VSectionTitle from "@/Components/SectionTitle";
    import Visits from "@/Pages/Metrics/Visits";

    export default {
        components: { Visits, VSectionTitle, VContainer, AppLayout },
        data() {
            return {};
        },
        methods: {},
    };
</script>
