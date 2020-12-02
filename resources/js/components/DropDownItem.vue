<template>
    <div :class="[classes, 'block px-4 py-3 text-gray-600 hover:bg-gray-100 cursor-pointer', !last ? 'border-b border-gray-100': '']" role="menuitem" @click="clicked">
        <slot></slot>
    </div>
</template>

<script>
    export default {
        name: 'DropDownItem',
        props: ['classes', 'last'],
        methods: {
            clicked() {
                this.$emit('click', true)
            }
        }
    }
</script>
