<template>
    <div v-show="message">
        <p class="text-xs text-red-600">
            {{ message }}
        </p>
    </div>
</template>

<script>
    export default {
        name: "VHiddenInputError",

        props: ["message"],
    };
</script>
