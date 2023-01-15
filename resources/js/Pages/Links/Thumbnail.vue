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
                <div class="text-center">Set a thumbnail for your link</div>
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
                <div class="inline-flex">
                    <v-secondary-button
                        :full="true"
                        @click="$refs.imagePicker.show()"
                        :small="true"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Select or Upload
                    </v-secondary-button>
                </div>
                <v-danger-button
                    :full="true"
                    :class="{ 'opacity-25': deleteForm.processing || !link.thumbnail }"
                    :disabled="deleteForm.processing || !link.thumbnail"
                    @click="deleteThumbnail"
                    :small="true"
                >
                    Delete
                </v-danger-button>
            </div>
            <v-image-picker
                title="Upload an Image"
                ref="imagePicker"
                @selected="imageSelected"
            />
        </div>
    </transition>
</template>

<script>
    import VButton from "@/Components/Button";
    import VSecondaryButton from "@/Components/SecondaryButton";
    import VDangerButton from "@/Components/DangerButton";
    import VDialogModal from "@/Components/DialogModal";
    import VImagePicker from "@/Components/ImagePicker";

    export default {
        components: { VImagePicker, VDialogModal, VDangerButton, VSecondaryButton, VButton },
        props: ["link"],
        data() {
            return {
                show: false,
                form: this.$inertia.form({
                    type: "",
                    thumbnail: "",
                }),
                deleteForm: this.$inertia.form({}),
            };
        },
        methods: {
            toggleShow() {
                this.show = !this.show;
            },
            imageSelected(e) {
                if (e.type === "upload") {
                    this.form.thumbnail = e.value;
                    this.form.type = "upload";
                    this.form.post(route("links.update-thumbnail", { link: this.link }), {
                        forceFormData: true,
                        errorBag: "updateThumbnail",
                        preserveScroll: true,
                        onSuccess: () => (this.show = false),
                    });
                } else if (e.type === "icon") {
                }
            },
            deleteThumbnail() {
                this.deleteForm.delete(route("links.delete-thumbnail", { link: this.link }), {
                    errorBag: "deleteThumbnail",
                    preserveScroll: true,
                });
            },
        },
    };
</script>
