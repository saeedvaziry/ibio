<template>
    <label :for="id" class="relative inline-flex cursor-pointer items-center">
        <input
            type="checkbox"
            :id="id"
            class="peer sr-only"
            :value="value"
            v-model="proxyChecked"
        />
        <div
            class="peer h-4 w-7 rounded-full bg-gray-300 after:absolute after:top-[2px] after:left-[2px] after:h-3 after:w-3 after:rounded-full after:border after:border-gray-300 after:bg-white after:content-[''] peer-checked:bg-green-500 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-0 peer-focus:ring-green-300"
        ></div>
    </label>
</template>

<script>
    export default {
        name: "VSwitch",

        emits: ["update:checked"],

        props: {
            checked: {
                type: [Array, Boolean],
                default: false,
            },
            value: {
                default: null,
            },
            id: String,
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

<style scoped></style>
