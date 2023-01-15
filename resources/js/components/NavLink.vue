<template>
    <inertia-link
        :href="href"
        class="flex h-10 items-center justify-start rounded-lg px-3 hover:bg-primary-900"
        :class="{ 'bg-primary-900': active }"
    >
        <img :src="customIcon" v-if="customIcon" alt="Icon" class="h-5 w-5" />
        <div class="text-md ml-1 hidden font-semibold text-gray-100 md:block">
            <slot></slot>
        </div>
    </inertia-link>
</template>

<script>
    export default {
        name: "VNavLink",
        props: {
            href: String,
            icon: Array,
            customIcon: String,
            active: Boolean,
        },
    };
</script>
