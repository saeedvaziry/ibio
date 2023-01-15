<template>
    <button
        :type="type"
        :class="{
            'w-full': full,
            'w-max': !full,
            'opacity-50': processing,
            'px-3 py-1 text-sm': small,
            'px-4 py-2 text-md': !small,
        }"
        class="inline-flex items-center justify-center rounded-xl   bg-red-600 font-normal font-medium text-white transition hover:bg-opacity-80 focus:outline-none disabled:opacity-25"
        :disabled="processing"
    >
        <slot></slot>
    </button>
</template>

<script>
    export default {
        name: "VDangerButton",
        props: {
            type: {
                type: String,
                default: "submit",
            },
            full: {
                type: Boolean,
                default: false,
            },
            processing: {
                default: false,
            },
            small: {
                type: Boolean,
                default: false,
            },
        },
    };
</script>
