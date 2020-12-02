<template>
    <div :class="[cardClass, 'border-2 rounded-lg', padding ? padding : 'p-7', border ? border : 'border-gray-100']">
        <slot></slot>
    </div>
</template>

<script>
    export default {
        name: 'Card',
        props: ['cardClass', 'padding', 'border']
    }
</script>
