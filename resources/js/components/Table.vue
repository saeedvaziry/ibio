<template>
    <div class="flex flex-col">
        <div
            class="inline-block min-w-full overflow-x-auto rounded-md bg-white align-middle shadow"
        >
            <table class="min-w-full border-collapse">
                <slot></slot>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        name: "VTable",
        props: {
            shadow: {
                type: Boolean,
                default: true,
            },
        },
    };
</script>

<style>
    table tr:last-child td {
        border-bottom: none !important;
    }
</style>
