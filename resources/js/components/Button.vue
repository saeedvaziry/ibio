<template>
    <div>
        <button v-if="type === 'primary'" :disabled="loading" type="button" :class="[`bg-purple-600 hover:bg-purple-400 transition-colors focus:outline-none inline-flex items-center justify-center ${small ? 'text-md' : 'text-xl'} font-normal text-white ${small ? 'py-2 px-4' : 'h-12 py-2 px-6'} rounded-lg`, {'w-full': full, 'cursor-not-allowed': loading}]" @click="clicked" style="min-width: 110px">
            <v-loader v-if="loading" color="text-white" class="w-10 py-2"></v-loader>
            <slot v-else></slot>
        </button>
        <button v-else-if="type === 'secondary'" type="button" :disabled="loading" :class="[`bg-gray-100 focus:outline-none hover:bg-gray-200 transition-colors inline-flex items-center justify-center ${small ? 'text-md' : 'text-xl'} font-semibold text-black ${small ? 'py-2 px-4' : 'h-12 py-2 px-6'} rounded-lg`, {'w-full': full, 'cursor-not-allowed': loading}]" @click="clicked">
            <v-loader v-if="loading" class="w-8 py-2"></v-loader>
            <slot v-else></slot>
        </button>
        <button v-else-if="type === 'color'" type="button" :disabled="loading" :class="[`bg-${color}-100 focus:outline-none hover:bg-${color}-200 transition-colors inline-flex items-center justify-center ${small ? 'text-md' : 'text-xl'} font-semibold text-${color}-500 ${small ? 'py-2 px-4' : 'h-12 py-2 px-6'} rounded-lg`, {'w-full': full, 'cursor-not-allowed': loading}]" @click="clicked">
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
