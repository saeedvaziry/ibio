<template>
    <div>
        <v-label v-if="label" :of="name">{{ label }}</v-label>
        <input ref="input" :id="name" :type="type" :placeholder="placeholder" v-model="inner_value" :disabled="disabled" class="py-3 px-4 w-full bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-black dark:focus:ring-gray-700 focus:bg-white dark:focus:ring-gray-500 placeholder-gray-500 dark:placeholder-gray-400 rounded-lg" :class="[inputClass, {error: 'ring-2 ring-red-500', 'ltr': ltr}]" @focus="focus = true" @blur="focus = false" autocomplete="off" @keyup="$emit('keyup', true)">
        <p v-if="error" class="text-red-500 text-xs mt-1">{{ error }}</p>
        <p v-if="help" class="text-gray-600 text-xs mt-1">{{ help }}</p>
    </div>
</template>

<script>
    export default {
        name: 'Input',
        props: {
            name: String,
            value: null,
            type: {
                type: String,
                default: 'text'
            },
            label: {
                type: String,
                default: ''
            },
            placeholder: {
                type: String,
                default: ''
            },
            help: {
                type: String,
                default: ''
            },
            classes: {
                type: String,
                default: ''
            },
            theme: {
                type: String,
                default: ''
            },
            disabled: {
                type: Boolean,
                default: false
            },
            inputClass: {
                type: String,
                default: ''
            },
            focusClass: {
                type: String,
                default: ''
            },
            money: {
                type: Boolean,
                default: false
            },
            error: String,
            ltr: {
                type: Boolean,
                default: false
            }
        },
        mounted() {
            if (this.value) {
                this.inner_value = this.value;
            }
        },
        data() {
            return {
                inner_value: '',
                input_classes: '',
                focus: false
            }
        },
        watch: {
            inner_value(newVal) {
                this.$emit('input', newVal);
            },
            value(newVal) {
                this.inner_value = newVal;
            }
        }
    }
</script>
