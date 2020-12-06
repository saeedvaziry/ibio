<template>
    <div>
        <button v-if="type === 'primary'" :disabled="loading" type="button" :class="[`bg-purple-600 hover:bg-purple-400 transition-colors focus:outline-none inline-flex items-center justify-center ${small ? 'text-sm md:text-md' : 'text-md md:text-xl'} font-normal text-white ${small ? 'py-2 px-4' : 'h-12 py-2 px-6'} rounded-lg`, {'w-full': full, 'cursor-not-allowed': loading}]" @click="clicked">
            <v-loader v-if="loading" color="text-white" class="w-10 py-2 absolute"></v-loader>
            <div :class="{'opacity-0': loading}">
                <slot></slot>
            </div>
        </button>
        <button v-else-if="type === 'secondary'" type="button" :disabled="loading" :class="[`bg-gray-100 focus:outline-none hover:bg-gray-200 transition-colors inline-flex items-center justify-center ${small ? 'text-sm md:text-md' : 'text-md md:text-xl'} font-semibold text-gray-700 ${small ? 'py-2 px-4' : 'h-12 py-2 px-6'} rounded-lg`, {'w-full': full, 'cursor-not-allowed': loading}]" @click="clicked">
            <v-loader v-if="loading" class="w-8 py-2"></v-loader>
            <slot v-else></slot>
        </button>
        <button v-else-if="type === 'text'" type="button" :disabled="loading" :class="[`focus:outline-none hover:bg-gray-100 transition-colors inline-flex items-center justify-center ${small ? 'text-sm md:text-md' : 'text-md md:text-xl'} font-semibold text-gray-700 ${small ? 'py-2 px-4' : 'h-12 py-2 px-6'} rounded-lg`, {'w-full': full, 'cursor-not-allowed': loading}]" @click="clicked">
            <v-loader v-if="loading" class="w-8 py-2"></v-loader>
            <slot v-else></slot>
        </button>
        <button v-else-if="type === 'color'" type="button" :disabled="loading" :class="[`bg-${color}-100 focus:outline-none hover:bg-${color}-200 transition-colors inline-flex items-center justify-center ${small ? 'text-sm md:text-md' : 'text-md md:text-xl'} font-semibold text-${color}-600 ${small ? 'py-2 px-4' : 'h-12 py-2 px-6'} rounded-lg`, {'w-full': full, 'cursor-not-allowed': loading}]" @click="clicked">
            <v-loader v-if="loading" class="w-8 py-2"></v-loader>
            <slot v-else></slot>
        </button>
    </div>
</template>

<script>
    export default {
        name: 'Button',
        props: {
            type: {
                type: String,
                default: 'primary'
            },
            loading: {
                type: Boolean,
                default: false
            },
            full: {
                type: Boolean,
                default: false
            },
            small: {
                type: Boolean,
                default: false
            },
            color: {
                type: String
            }
        },
        methods: {
            clicked() {
                if (!this.loading) {
                    this.$emit('click', true)
                }
            }
        }
    }
</script>
