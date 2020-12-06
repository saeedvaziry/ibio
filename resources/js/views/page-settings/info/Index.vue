<template>
    <page-settings>
        <username class="mb-5"></username>
        <info class="mb-5"></info>
    </page-settings>
</template>

<script>
    import Username from "./Username";
    import Info from "./Info";

    export default {
        name: 'PageInfo',
        components: {Info, Username}
    }
</script>
