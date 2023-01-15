<template>
    <div v-if="hasErrors" class="rounded-xl   border border-red-300 bg-red-50">
        <ul class="list-inside list-disc p-4 text-sm text-red-600">
            <li v-for="(error, key) in errors" :key="key">{{ error }}</li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "VValidationErrors",

        computed: {
            errors() {
                return this.$page.props.errors;
            },

            hasErrors() {
                return Object.keys(this.errors).length > 0;
            },
        },
    };
</script>
