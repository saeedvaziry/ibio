<template>
    <div class="flex min-h-screen flex-col items-center justify-center bg-gray-100">
        <div class="z-10 mx-auto w-full max-w-md">
            <div>
                <slot name="logo" />
            </div>
            <div class="mt-10 w-full overflow-hidden rounded-xl   bg-white p-7 border border-gray-200">
                <slot />
            </div>

            <div>
                <slot name="footer" />
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "VAuthenticationCard",
    };
</script>

<style>
    .auth-bg {
        height: 50%;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
    }
</style>
