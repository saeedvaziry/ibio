<template>
    <inertia-link :href="href" class="px-3 py-2 flex items-center justify-center lg:justify-between cursor-pointer rounded-xl   mb-3" :class="[{'hover:bg-gray-100 dark:hover:bg-primary-500 dark:hover:bg-opacity-10 text-gray-700': !active}, active === true ? activeClass : '']">
        <div class="flex items-center text-lg">
            <slot name="icon"></slot>
            <div class="hidden lg:block ml-2" :class="{'text-primary-600': active, 'text-gray-700 dark:text-gray-300': !active}">
                <slot></slot>
            </div>
        </div>
    </inertia-link>
</template>

<script>
    export default {
        name: 'VSidebarItem',
        props: ['href', 'active'],
        data() {
            return {
                activeClass: 'bg-primary-100 dark:bg-primary-500 dark:bg-opacity-10 text-primary-600'
            }
        }
    }
</script>
