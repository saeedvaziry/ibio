<template>
    <div :class="[cardClass, 'border-2 rounded-lg', padding ? padding : 'p-3 md:p-6', border ? border : 'border-gray-100 dark:border-gray-800']">
        <slot></slot>
    </div>
</template>

<script>
    export default {
        name: 'Card',
        props: ['cardClass', 'padding', 'border']
    }
</script>
