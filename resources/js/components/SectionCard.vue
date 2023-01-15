<template>
    <div class="flex flex-col md:flex-row justify-between rounded-md bg-white px-4 py-5 border border-gray-200 sm:p-6 md:col-span-1">
        <div>
            <h3 class="text-lg font-medium text-gray-900">
                <slot name="title"></slot>
            </h3>

            <p class="mt-1 text-sm text-gray-600 text-center md:text-left">
                <slot name="description"></slot>
            </p>
        </div>

        <div>
            <slot name="aside"></slot>
        </div>
    </div>
</template>

<script>
    export default {
        name: "VSectionCard",
    };
</script>
