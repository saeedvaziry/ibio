<template>
    <div>
        <img v-if="user.avatar" :class="`w-${size} h-${size}`" class="rounded-full" :src="user.avatar" alt="" />
        <div v-else :class="`w-${size} h-${size} text-${font}`" class="rounded-full inline-flex items-center font-semibold justify-center bg-purple-200 text-purple-700 border-4 border-purple-100 capitalize">
            {{ user.name.charAt(0) }}{{ user.name.charAt(1) }}
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Avatar',
        props: {
            size: {
                type: Number,
                default: 10
            },
            font: {
                type: String,
                default: 'md'
            },
            user: Object
        }
    }
</script>
