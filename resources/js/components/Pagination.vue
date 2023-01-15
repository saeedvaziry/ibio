<template>
    <div>
        <div class="hidden md:inline-flex md:items-center">
            <button
                type="button"
                v-for="(link, i) in meta.links"
                :disabled="!link.url"
                @click="$inertia.visit(link.url)"
                :class="{'bg-primary-500 text-white hover:text-white': link.active}"
                class="mr-1 inline-flex items-center px-4 py-1 bg-white border border-gray-300 rounded-md font-medium text-gray-700 capitalize shadow-sm hover:text-gray-500 focus:outline-none focus:border-primary-300 focus:ring focus:ring-primary-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 disabled:cursor-default transition"
            >
                <template v-if="i === 0">«</template>
                <template v-else-if="i === meta.links.length - 1">»</template>
                <template v-else>{{ link.label }}</template>
            </button>
        </div>
        <div class="inline-flex items-center md:hidden">
            <button
                type="button"
                :disabled="!links.prev"
                @click="$inertia.visit(links.prev)"
                class="mr-1 inline-flex items-center px-4 py-1 bg-white border border-gray-300 rounded-md font-medium text-gray-700 capitalize shadow-sm hover:text-gray-500 focus:outline-none focus:border-primary-300 focus:ring focus:ring-primary-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 disabled:cursor-default transition"
            >« Previous
            </button>
            <button
                type="button"
                :disabled="!links.next"
                @click="$inertia.visit(links.next)"
                class="mr-1 inline-flex items-center px-4 py-1 bg-white border border-gray-300 rounded-md font-medium text-gray-700 capitalize shadow-sm hover:text-gray-500 focus:outline-none focus:border-primary-300 focus:ring focus:ring-primary-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 disabled:cursor-default transition"
            >Next »
            </button>
        </div>
    </div>
</template>

<script>
    import VSecondaryButton from "@/Components/SecondaryButton";

    export default {
        name: "VPagination",
        components: {VSecondaryButton},
        props: {
            meta: Object,
            links: Object
        }
    }
</script>
