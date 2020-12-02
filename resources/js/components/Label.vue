<template>
    <label class="block mb-2" :for="of">
        <slot></slot>
    </label>
</template>

<script>
    export default {
        name: 'Label',
        props: ['of']
    }
</script>
