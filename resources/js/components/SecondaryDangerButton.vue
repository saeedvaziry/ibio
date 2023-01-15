<template>
    <button
        :type="type"
        class="inline-flex w-max items-center justify-center rounded-md border border-transparent bg-red-50 px-4 py-1 font-medium capitalize text-red-500 transition hover:bg-red-100 focus:outline-none focus:ring focus:ring-red-200 active:bg-red-100 disabled:opacity-25"
    >
        <slot></slot>
    </button>
</template>

<script>
    export default {
        name: "VSecondaryDangerButton",

        props: {
            type: {
                type: String,
                default: "button",
            },
        },
    };
</script>
