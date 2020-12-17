<template>
    <div>
        <div @click="open = !open" v-click-outside="hideDropDown" class="z-0">
            <slot name="link"></slot>
        </div>
        <div class="relative">
            <transition enter-active-class="transition ease-out duration-100 transform" enter-class="opacity-0 scale-95" enter-to-class="opacity-100 scale-100" leave-active-class="transition ease-in duration-75 transform" leave-class="opacity-100 scale-100" leave-to-class="opacity-0 scale-95">
                <div v-show="open || forceOpen" class="origin-top-right absolute mt-2 w-48 min-w-full rounded-md z-10" :class="[{'right-0': openDirection === 'right', 'left-0': openDirection === 'left'}]">
                    <div class="py-1 rounded-lg bg-white shadow-lg border border-gray-100" role="menu" aria-orientation="vertical" aria-labelledby="dropdown" :class="itemsClass">
                        <slot name="items"></slot>
                    </div>
                </div>
            </transition>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'DropDown',
        props: {
            forceOpen: {
                type: Boolean,
                default: false
            },
            itemsClass: String,
            openDirection: {
                type: String,
                default: 'left'
            }
        },
        data() {
            return {
                open: false,
            }
        },
        watch: {
            show(newVal) {
                this.open = newVal;
            }
        },
        methods: {
            hideDropDown() {
                if (this.open) {
                    setTimeout(function () {
                        this.open = false;
                    }.bind(this), 50)
                }
            }
        }
    }
</script>
