<template>
    <transition
        enter-active-class="max-h-24 ease-out duration-300"
        enter-from-class="max-h-0"
        leave-active-class="max-h-24 ease-in duration-200"
        leave-to-class="max-h-0"
    >
        <div v-show="show" class="overflow-hidden rounded-b-md border-t border-gray-200 p-3">
            <div class="flex items-center justify-between">
                <div></div>
                <div class="text-center">Are you sure that you want to delete this?</div>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 cursor-pointer text-gray-500"
                    @click="show = false"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
            <div class="mt-3 grid w-full grid-cols-2 gap-3 bg-white">
                <v-secondary-button :full="true" @click="show = false" :small="true"
                    >Cancel
                </v-secondary-button>
                <v-danger-button
                    @click="deleteLink"
                    :full="true"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                    :small="true"
                >
                    Delete
                </v-danger-button>
            </div>
        </div>
    </transition>
</template>

<script>
    import VButton from "@/Components/Button";
    import VSecondaryButton from "@/Components/SecondaryButton";
    import VDangerButton from "@/Components/DangerButton";

    export default {
        components: {VDangerButton, VSecondaryButton, VButton },
        props: ["link"],
        data() {
            return {
                show: false,
                form: this.$inertia.form({}),
            };
        },
        methods: {
            toggleShow() {
                this.show = !this.show;
            },
            deleteLink() {
                this.form.delete(route("links.delete", { link: this.link }));
            },
        },
    };
</script>
