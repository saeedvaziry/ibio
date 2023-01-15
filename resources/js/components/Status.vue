<template>
    <div class="inline-flex">
        <span
            v-if="status === 'success'"
            class="rounded-full bg-green-50 px-2 py-1 text-xs font-semibold uppercase tracking-wide text-green-500"
        >
            <slot></slot>
        </span>
        <span
            v-if="status === 'error'"
            class="rounded-full bg-red-50 px-2 py-1 text-xs font-semibold uppercase tracking-wide text-red-500"
        >
            <slot></slot>
        </span>
        <span
            v-if="status === 'warning'"
            class="rounded-full bg-yellow-50 px-2 py-1 text-xs font-semibold uppercase tracking-wide text-yellow-500"
        >
            <slot></slot>
        </span>
        <span
            v-if="status === 'disabled'"
            class="rounded-full bg-gray-100 px-2 py-1 text-xs font-semibold uppercase tracking-wide text-gray-500"
        >
            <slot></slot>
        </span>
        <span
            v-if="status === 'info'"
            class="rounded-full bg-primary-50 px-2 py-1 text-xs font-semibold uppercase tracking-wide text-primary-500"
        >
            <slot></slot>
        </span>
    </div>
</template>

<script>
    export default {
        name: "VStatus",
        props: {
            status: String,
            label: String,
        },
    };
</script>
