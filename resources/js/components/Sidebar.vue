<template>
    <div class="hidden lg:block sm:w-full md:w-5/12 lg:w-5/12 xl:w-4/12 2xl:w-3/12 ml-0 md:ml-5 mb-5">
        <div class="w-full">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Sidebar'
    }
</script>
