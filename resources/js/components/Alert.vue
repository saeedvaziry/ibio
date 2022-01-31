<template>
    <div>
        <div v-if="errors">
            <div class="bg-red-100 dark:bg-red-500 dark:bg-opacity-10 border-l-4 border-red-500 text-red-700 p-4 rounded-sm">
                <ul class="mb-0">
                    <li v-for="(error, index) in Object.values(errors)" :key="index">{{ error }}</li>
                </ul>
            </div>
        </div>
        <div v-else-if="errorMsg" class="bg-red-100 dark:bg-red-500 dark:bg-opacity-10 border-l-4 border-red-500 text-red-700 p-4 rounded-sm">
            <template>{{ errorMsg }}</template>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Alert",
        props: {
            errors: Object,
            default() {
                return {}
            }
        },
        data() {
            return {
                errorMsg: null
            }
        },
        methods: {
            error(msg) {
                this.errorMsg = msg;
            }
        }
    };
</script>
