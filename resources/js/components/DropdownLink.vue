<template>
    <div class="focus:ring-1 focus:ring-primary-500">
        <button
            ref="button"
            type="submit"
            class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 transition hover:bg-gray-100 focus:bg-gray-200 focus:outline-none"
            v-if="as === 'button'"
        >
            <slot></slot>
        </button>

        <a
            ref="a"
            :href="href"
            class="block px-4 py-2 text-sm leading-5 text-gray-700 transition hover:bg-gray-100 focus:bg-gray-200 focus:outline-none"
            v-else-if="as === 'a'"
        >
            <slot></slot>
        </a>

        <inertia-link
            ref="link"
            :href="href"
            class="block px-4 py-2 text-sm leading-5 text-gray-700 transition hover:bg-gray-100 focus:bg-gray-200 focus:outline-none"
            v-else
        >
            <slot></slot>
        </inertia-link>
    </div>
</template>

<script>
    export default {
        name: "VDropdownLink",

        props: ["href", "as"],

        methods: {
            focus() {
                if (this.as === "button") {
                    this.$refs.button.$el.focus();
                } else if (this.as === "a") {
                    this.$refs.a.$el.focus();
                } else {
                    this.$refs.link.$el.focus();
                }
            },
        },
    };
</script>
