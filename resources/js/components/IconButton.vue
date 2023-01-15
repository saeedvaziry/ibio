<template>
    <button
        :type="type"
        class="inline-flex items-center font-medium capitalize text-gray-700 transition hover:text-gray-500 focus:border-primary-300 focus:outline-none focus:ring focus:ring-primary-200 active:bg-gray-50 active:text-gray-800 disabled:opacity-25"
    >
        <slot></slot>
    </button>
</template>

<script>
    export default {
        name: "VIconButton",

        props: {
            type: {
                type: String,
                default: "button",
            },
        },
    };
</script>
