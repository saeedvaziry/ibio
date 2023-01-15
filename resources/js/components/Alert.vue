<template>
    <div>
        <div
            v-if="type === 'warning'"
            class="rounded-sm border-l-4 border-yellow-500 bg-yellow-100 py-3 px-4 text-yellow-700"
        >
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        name: "VAlert",
        props: {
            type: String,
        },
    };
</script>
