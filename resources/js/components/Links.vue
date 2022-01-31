<template>
    <div class="flex my-3" v-if="links.prev || links.next">
        <inertia-link v-if="links.prev" :href="links.prev" class="bg-white dark:bg-gray-800 rounded-l py-2 px-3 shadow-sm border hover:bg-gray-100 dark:hover:bg-gray-700" :disabled="true">
            قبلی
        </inertia-link>
        <span v-else class="bg-white dark:bg-gray-800 rounded-l py-2 px-3 shadow-sm border hover:bg-gray-100 dark:hover:bg-gray-700 cursor-default">
            قبلی
        </span>
        <inertia-link v-if="links.next" :href="links.next" class="bg-white dark:bg-gray-800 rounded-r py-2 px-3 shadow-sm border hover:bg-gray-100 dark:hover:bg-gray-700">
            بعدی
        </inertia-link>
        <span v-else class="bg-white dark:bg-gray-800 rounded-r py-2 px-3 shadow-sm border hover:bg-gray-100 dark:hover:bg-gray-700 cursor-default">
            بعدی
        </span>
    </div>
</template>

<script>
    export default {
        props: ['links'],
    }
</script>
