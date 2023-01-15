<template>
    <div class="mb-10 w-full">
        <v-section-title class="mb-5">
            <template #title>
                <slot name="title"></slot>
            </template>
            <template #description>
                <slot name="description"></slot>
            </template>
        </v-section-title>

        <div class="mt-5 md:col-span-2 md:mt-0">
            <div class="rounded-lg bg-white p-6 border border-gray-200 dark:border-gray-800">
                <slot name="content"></slot>
            </div>
        </div>
    </div>
</template>

<script>
    import VSectionTitle from "./SectionTitle";

    export default {
        name: "VActionSection",
        components: {
            VSectionTitle,
        },
    };
</script>
