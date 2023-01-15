<template>
    <textarea
        class="rounded-2xl border-gray-300 shadow-sm focus:border-gray-400 focus:ring focus:ring-gray-300 focus:ring-opacity-50"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
    >
    </textarea>
</template>

<script>
    export default {
        name: "VTextarea",

        props: ["modelValue"],

        emits: ["update:modelValue"],

        methods: {
            focus() {
                this.$refs.input.focus();
            },
        },
    };
</script>
