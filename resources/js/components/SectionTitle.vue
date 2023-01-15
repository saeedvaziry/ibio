<template>
    <div
        class="flex justify-between md:col-span-1"
        :class="{ 'items-center': !$slots.description }"
    >
        <div>
            <h3 class="text-lg font-medium text-gray-900">
                <slot name="title"></slot>
            </h3>

            <p class="mt-1 text-sm text-gray-600">
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
        name: "VSectionTitle",
    };
</script>
