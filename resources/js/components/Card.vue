<template>
    <div
        :class="[
            cardClass,
            'rounded-xl   border bg-white',
            padding ? padding : 'p-3 md:p-6',
            border ? border : 'border-gray-200 dark:border-gray-800',
        ]"
    >
        <slot></slot>
    </div>
</template>

<script>
    export default {
        name: "VCard",
        props: ["cardClass", "padding", "border"],
    };
</script>
