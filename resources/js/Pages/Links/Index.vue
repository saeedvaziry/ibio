<template>
    <app-layout>
        <v-container>
            <v-section-title>
                <template #title>Manage your links</template>
                <template #description> Here you can create and manage your links </template>
                <template #aside>
                    <create-custom-link />
                </template>
            </v-section-title>

            <links class="mt-5" />
        </v-container>
    </app-layout>
</template>

<script>
    import AppLayout from "@/Layouts/AppLayout";
    import Links from "@/Pages/Links/Links";
    import CreateFirstLink from "@/Pages/Links/CreateFirstLink";
    import CreateButton from "@/Pages/Links/CreateButton";
    import CreateCustomLink from "@/Pages/Links/CreateCustomLink";
    import VSectionTitle from "@/Components/SectionTitle";
    import VContainer from "@/Components/Container";
    import VCard from "@/Components/Card";
    import VAvatar from "@/Components/Avatar";
    import VButtonCopy from "@/Components/ButtonCopy";

    export default {
        name: "Index",
        components: {
            VButtonCopy,
            VAvatar,
            VCard,
            VContainer,
            VSectionTitle,
            CreateCustomLink,
            CreateButton,
            CreateFirstLink,
            Links,
            AppLayout,
        },
    };
</script>
