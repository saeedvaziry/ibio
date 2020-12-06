<template>
    <h2 class="text-black" :class="{'text-md md:text-2xl': small, 'text-lg md:text-3xl': !small}">
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
