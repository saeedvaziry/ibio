<template>
    <input
        type="checkbox"
        :value="value"
        v-model="proxyChecked"
        class="rounded-xl   border-gray-300 text-black shadow-sm focus:border-black focus:ring focus:ring-black focus:ring-opacity-10"
    />
</template>

<script>
    export default {
        name: "VCheckbox",

        emits: ["update:checked"],

        props: {
            checked: {
                type: [Array, Boolean],
                default: false,
            },
            value: {
                default: null,
            },
        },

        computed: {
            proxyChecked: {
                get() {
                    return this.checked;
                },

                set(val) {
                    this.$emit("update:checked", val);
                },
            },
        },
    };
</script>
