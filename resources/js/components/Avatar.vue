<template>
    <div class="inline-flex items-center justify-start">
        <img
            v-if="user.avatar"
            class="flex-none rounded-full object-cover shadow"
            :class="imageClass"
            :src="user.avatar"
            :alt="user.name"
        />
        <div v-else class="inline-flex items-center justify-center rounded-full bg-primary-200 capitalize text-primary-600 dark:border-primary-500 dark:border-opacity-20 dark:bg-primary-500 dark:bg-opacity-10" :class="imageClass">
            {{ user.name[0] }}
        </div>

        <div class="ml-2 hidden leading-tight lg:block" v-if="withName || withEmail">
            <div v-if="withName">{{ user.name }}</div>
            <div v-if="withEmail" class="text-sm text-gray-400">{{ user.email }}</div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "VAvatar",
        props: {
            user: Object,
            withName: {
                type: Boolean,
                default: true,
            },
            withEmail: {
                type: Boolean,
                default: false,
            },
            imageClass: {
                type: String,
                default: "w-12 h-12",
            },
        },
    };
</script>
