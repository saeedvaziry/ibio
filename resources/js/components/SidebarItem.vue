<template>
    <inertia-link :href="href" class="px-3 py-2 flex justify-between items-center cursor-pointer rounded-lg mb-3" :class="[{'hover:bg-gray-100 dark:hover:bg-purple-500 dark:hover:bg-opacity-10': !active}, active === true ? activeClass : '']">
        <div class="flex items-center text-lg">
            <fa-icon v-if="icon" :icon="icon" class="w-3 ml-2" :class="{'text-purple-600': active, 'text-gray-500 dark:text-gray-300': !active}"></fa-icon>
            <div :class="{'text-purple-600': active, 'text-gray-700 dark:text-gray-300': !active}">
                <slot></slot>
            </div>
        </div>
    </inertia-link>
</template>

<script>
    export default {
        name: 'SidebarItem',
        props: ['href', 'active', 'icon'],
        data() {
            return {
                activeClass: 'bg-purple-100 dark:bg-purple-500 dark:bg-opacity-10 text-purple-700 '
            }
        }
    }
</script>
