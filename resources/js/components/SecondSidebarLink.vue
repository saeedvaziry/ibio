<template>
    <inertia-link :href="href" class="px-3 py-2 flex items-center justify-start rounded-md" :class="{'bg-gray-50 hover:bg-gray-50': active, 'hover:bg-gray-100': !active}">
        <fa-icon :icon="icon" v-if="icon" class="w-5 h-5 fa-fw" :class="{'text-gray-800': active, 'text-gray-900': !active}"></fa-icon>
        <img :src="customIcon" v-if="customIcon" alt="Icon" class="w-5 h-5" />
        <div class="font-semibold text-md ml-1" :class="{'text-gray-800': active, 'text-gray-900': !active}">
            <slot></slot>
        </div>
    </inertia-link>
</template>

<script>
    export default {
        name: "SecondSidebarLink",
        props: {
            href: String,
            icon: Array,
            customIcon: String,
            active: Boolean
        }
    }
</script>
