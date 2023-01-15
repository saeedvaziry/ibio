<template>
    <input
        class="rounded-xl border border-gray-300 shadow-sm focus:border-black focus:ring-0 disabled:bg-gray-100 py-2 text-md px-4"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
    />
</template>

<script>
    export default {
        name: "VInput",

        props: ["modelValue", "value"],

        mounted() {
            if (this.value) {
                this.$emit("update:modelValue", this.value);
            }
        },

        emits: ["update:modelValue"],

        methods: {
            focus() {
                this.$refs.input.focus();
            },
        },
    };
</script>
