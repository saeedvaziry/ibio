<template>
    <div
        class="flex h-20 w-full items-center justify-between rounded-md bg-white py-6 px-4 shadow hover:bg-gray-100"
    >
        <slot></slot>
    </div>
</template>

<script>
    export default {
        name: "VItemBox",
    };
</script>
