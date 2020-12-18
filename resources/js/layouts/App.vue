<template>
    <div style="min-height: calc(100vh - 80px)">
        <navbar></navbar>
        <slot></slot>
        <v-toast ref="toast"></v-toast>
    </div>
</template>

<script>
    import Navbar from "./Navbar";

    export default {
        name: 'App',
        components: {Navbar},
        created() {
            document.title = this.$page.props.title;
        }
    }
</script>
