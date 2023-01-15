<template>
    <div class="mb-10 w-full">
        <v-section-title class="mb-5" v-if="$slots.title || $slots.description">
            <template #title>
                <slot name="title"></slot>
            </template>
            <template #description>
                <slot name="description"></slot>
            </template>
        </v-section-title>

        <div
            class="mt-5 md:mt-0"
            :class="{
                'md:col-span-2': $slots.title || $slots.description,
                'md:col-span-3': !$slots.title && !$slots.description,
            }"
        >
            <form @submit.prevent="$emit('submitted')">
                <div
                    class="bg-white p-6 border border-gray-200 dark:border-gray-800"
                    :class="hasActions ? 'rounded-tl-md rounded-tr-md' : 'rounded-md'"
                >
                    <div class="grid grid-cols-6 gap-6">
                        <slot name="form"></slot>
                    </div>
                </div>

                <div
                    class="flex items-center justify-end rounded-bl-md rounded-br-md bg-gray-50 px-4 py-3 px-6 text-right border-b border-l border-r border-gray-200 dark:border-gray-800"
                    v-if="hasActions"
                >
                    <slot name="actions"></slot>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import VSectionTitle from "./SectionTitle";

    export default {
        name: "VFormSection",

        emits: ["submitted"],

        components: {
            VSectionTitle,
        },

        computed: {
            hasActions() {
                return !!this.$slots.actions;
            },
        },
    };
</script>
