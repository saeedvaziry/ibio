<template>
    <div>
        <transition leave-active-class="ease-in duration-100" leave-class="opacity-100" leave-to-class="opacity-0">
            <div v-show="open" class="fixed inset-0 transition-opacity" :class="{'z-10': level === 1, 'z-20': level === 2}" @click="open = false">
                <div class="absolute inset-0 bg-gray-900 opacity-75"></div>
            </div>
        </transition>
        <transition enter-active-class="transition ease-out duration-100 transform" enter-class="opacity-0 scale-95" enter-to-class="opacity-100 scale-100" leave-active-class="transition ease-in duration-75 transform" leave-class="opacity-100 scale-100" leave-to-class="opacity-0 scale-95">
            <div v-show="open" class="fixed top-0 inset-x-0 inset-1 h-screen sm:flex sm:items-start sm:justify-center p-5" :class="{'z-20': level === 1, 'z-30': level === 2}">
                <div class="fixed inset-0 transition-opacity" @click="open = false">
                    <div class="absolute inset-0"></div>
                </div>
                <div class="bg-white rounded-md shadow-xl transform transition-all sm:w-11/12" :class="{'sm:max-w-lg': size === 'lg','sm:max-w-xl': size === 'xl','sm:max-w-2xl': size === '2xl','sm:max-w-3xl': size === '3xl','sm:max-w-4xl': size === '4xl',}">
                    <i class="icon-close opacity-50 left-0 top-0 ml-2 mt-4 absolute cursor-pointer" @click="hide()"></i>
                    <slot></slot>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
    export default {
        name: "Modal",
        props: {
            size: {
                type: String,
                default: "lg",
            },
            level: {
                type: Number,
                default: 1
            },
            forceOpen: {
                type: Boolean,
                default: false
            }
        },
        mounted() {
            this.open = this.forceOpen
        },
        data() {
            return {
                open: false,
            }
        },
        watch: {
            open(newVal) {
                if (newVal) {
                    document.body.classList.add('overflow-hidden')
                } else {
                    document.body.classList.remove('overflow-hidden')
                    this.$emit("closed")
                }
            },
        },
        methods: {
            show() {
                this.open = true
            },
            hide() {
                this.open = false
            },
        },
    }
</script>
