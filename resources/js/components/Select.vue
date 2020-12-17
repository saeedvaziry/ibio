<template>
    <div>
        <v-label id="listbox-label" v-if="label">{{ label }}</v-label>
        <div class="relative" v-click-outside="closeDropdown">
            <span class="inline-block w-full rounded-md shadow-sm">
                <button
                    type="button" @click="openDropdown" aria-haspopup="listbox" aria-expanded="true"
                    aria-labelledby="listbox-label"
                    :class="{'border-red-500': error}"
                    class="cursor-pointer relative w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-black focus:bg-white bg-gray-100 pr-4 pl-10 py-3 transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                >
                    <div class="flex items-center space-x-3 h-6">
                        <template v-if="selected">
                            <div
                                v-if="selected.img"
                                class="flex-shrink-0 h-6 w-6 bg-contain bg-no-repeat bg-center ml-2"
                                :style="'background-image: url(' + selected.img + ');'"
                            ></div>
                            <span class="block truncate"> {{ selected.title }}</span>
                        </template>
                    </div>
                    <span
                        class="absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none"
                    >
                        <svg
                            class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="none"
                            stroke="currentColor"
                        > <path
                            d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"
                        /> </svg>
                    </span>
                </button>
            </span>
            <transition
                enter-active-class="slide-down duration-100" enter-class="opacity-0"
                enter-to-class="opacity-100" leave-active-class="ease-in duration-100"
                leave-class="opacity-100" leave-to-class="opacity-0"
            >
                <div
                    v-show="isOpen" class="absolute mt-1 w-full rounded-md bg-white shadow-lg z-10"
                >
                    <ul
                        tabindex="-1" role="listbox" aria-labelledby="listbox-label"
                        class="rounded-md py-1 text-base leading-6 shadow-xs overflow-auto focus:outline-none sm:text-sm sm:leading-5 overflow-y-auto"
                        style="max-height: 300px;"
                    >
                        <li
                            tabindex="0" @click="select(d)" id="listbox-item-0" role="option"
                            v-for="(d, index) in data" v-bind:key="index"
                            class="text-gray-900 cursor-default select-none relative py-2 pr-3 pl-9  cursor-pointer hover:text-gray-800 hover:bg-gray-200 focus:outline-none focus:text-gray-800 focus:bg-gray-200"
                            :class="{'bg-gray-100': isSelected(d)}"
                        >
                            <div class="flex items-center space-x-3">
                                <div
                                    v-if="d.img"
                                    class="flex-shrink-0 h-6 w-6 bg-contain bg-no-repeat bg-center ml-2"
                                    :style="'background-image: url(' + d.img + ');'"
                                ></div>
                                <span
                                    class="block truncate"
                                    v-bind:class="{'font-normal': !isSelected(d), '': isSelected(d), 'text-gray-500': d.disabled}"
                                > {{ d.title }}
                                </span>
                            </div>
                            <span
                                v-show="isSelected(d)"
                                class="absolute inset-y-0 left-0 flex items-center pl-4"
                            >
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"> <path
                                    fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"
                                /> </svg>
                            </span>
                        </li>
                    </ul>
                </div>
            </transition>
        </div>
        <p v-if="error" class="text-red-500 text-xs mt-1">{{ error }}</p>
    </div>
</template>

<script>
    import ClickOutside from 'vue-click-outside'

    export default {
        name: 'Select2',
        props: ['data', 'value', 'label', 'error'],
        data() {
            return {
                isOpen: false,
                selected: {}
            }
        },
        mounted() {
            this.setSelected();
        },
        watch: {
            value() {
                this.setSelected();
            }
        },
        methods: {
            isSelected(item) {
                return this.value === item.value;
            },
            closeDropdown() {
                this.isOpen = false;
            },
            openDropdown() {
                this.isOpen = !this.isOpen;
            },
            select(item) {
                if (!item.disabled) {
                    this.isOpen = false;

                    this.$emit('selected', item.value);
                }
            },
            setSelected() {
                this.data.map((item) => {
                    if (item.value === this.value) {
                        this.selected = item;
                    }
                });
            }
        },
        directives: {
            ClickOutside
        }
    }
</script>
