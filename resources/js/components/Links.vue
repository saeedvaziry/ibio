<template>
    <div class="flex my-3" v-if="links.prev || links.next">
        <inertia-link v-if="links.prev" :href="links.prev" class="bg-white rounded-l py-2 px-3 shadow-sm border hover:bg-gray-100" :disabled="true">
            قبلی
        </inertia-link>
        <span v-else class="bg-white rounded-l py-2 px-3 shadow-sm border hover:bg-gray-100 cursor-default">
            قبلی
        </span>
        <inertia-link v-if="links.next" :href="links.next" class="bg-white rounded-r py-2 px-3 shadow-sm border hover:bg-gray-100">
            بعدی
        </inertia-link>
        <span v-else class="bg-white rounded-r py-2 px-3 shadow-sm border hover:bg-gray-100 cursor-default">
            بعدی
        </span>
    </div>
</template>

<script>
    export default {
        props: ['links'],
    }
</script>
