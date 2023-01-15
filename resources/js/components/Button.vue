<template>
    <button
        :type="type"
        :class="{
            'w-full': full,
            'w-max': !full,
            'opacity-50': processing,
            'text-md px-2 py-1': small,
            'px-4 py-2 text-md': !small,
        }"
        class="inline-flex items-center justify-center rounded-xl   bg-gradient-to-r from-primary-600 to-secondary-600 font-normal font-medium text-white transition hover:from-primary-600 hover:to-primary-600 focus:outline-none disabled:opacity-25"
        :disabled="processing"
    >
        <slot></slot>
    </button>
</template>

<script>
    export default {
        name: "VButton",
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
