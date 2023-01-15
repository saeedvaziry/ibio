<template>
    <button
        :type="type"
        class="inline-flex items-center justify-center rounded-xl   bg-gray-100 font-normal text-gray-600 shadow-sm transition hover:bg-gray-200 hover:bg-opacity-70 hover:text-gray-500 focus:outline-none active:bg-gray-200 active:text-gray-800 disabled:cursor-not-allowed disabled:opacity-50"
        :class="{
            'w-full': full,
            'w-max': !full,
            'opacity-50': processing,
            'px-3 py-1 text-sm': small,
            'px-4 py-2 text-md': !small,
        }"
        :disabled="processing"
    >
        <slot></slot>
    </button>
</template>

<script>
    export default {
        name: "VSecondaryButton",

        props: {
            type: {
                type: String,
                default: "button",
            },
            processing: {
                default: false,
            },
            full: {
                type: Boolean,
                default: false,
            },
            small: {
                type: Boolean,
                default: false,
            },
        },
    };
</script>
