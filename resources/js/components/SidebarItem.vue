<template>
    <inertia-link :href="href" class="px-3 py-2 flex justify-between items-center cursor-pointer rounded-lg font-semibold mb-3" :class="[{'hover:bg-gray-100': !active}, active === true ? activeClass : '']">
        <div class="flex items-center text-lg">
            <fa-icon v-if="icon" :icon="icon" class="w-3 mr-2" :class="{'text-purple-600': active, 'text-gray-500': !active}"></fa-icon>
            <div class="text-gray-700" :class="{'text-purple-600': active, 'text-gray-700': !active}">
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
                activeClass: 'bg-purple-100 text-purple-700'
            }
        }
    }
</script>
