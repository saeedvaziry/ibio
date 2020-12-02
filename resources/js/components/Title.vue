<template>
    <h2 class="text-black" :class="{'text-2xl': small, 'text-3xl': !small}">
        <slot></slot>
    </h2>
</template>

<script>
    export default {
        name: 'Title',
        props: {
            small: Boolean
        }
    }
</script>
