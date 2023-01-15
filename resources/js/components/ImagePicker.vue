<template>
    <v-dialog-modal max-width="xl" :show="modal" @close="modal = false">
        <template #title>
            <div v-if="type === 'icon'">Select an Icon</div>
            <div v-else>
                {{ title }}
            </div>
        </template>
        <template #content>
            <div v-if="type === 'image'"></div>
            <div v-else-if="type === 'icon'"></div>
            <div v-else>
                <!--<div-->
                <!--    @click="type = 'icon'"-->
                <!--    class="flex cursor-pointer items-center justify-center rounded-xl mb-3 border p-5 transition hover:bg-gray-100"-->
                <!--&gt;-->
                <!--    Select Icon-->
                <!--</div>-->
                <div
                    @click="$refs.file.click()"
                    class="flex cursor-pointer items-center justify-center rounded-xl border p-5 transition hover:bg-gray-100"
                >
                    Upload Image
                    <input
                        type="file"
                        class="hidden"
                        ref="file"
                        @change="uploadThumbnail"
                        accept="image/*"
                    />
                </div>
            </div>
        </template>
    </v-dialog-modal>
</template>

<script>
    import VDialogModal from "@/Components/DialogModal";

    export default {
        name: "VImagePicker",
        components: { VDialogModal },
        emits: ["selected"],
        props: {
            title: String,
            icon: {
                type: Boolean,
                default: true,
            },
            upload: {
                type: Boolean,
                default: true,
            },
        },
        data() {
            return {
                modal: false,
                type: "",
            };
        },
        methods: {
            show() {
                this.type = "";
                this.modal = true;
            },
            uploadThumbnail() {
                this.type = "";
                this.modal = false;
                this.$emit("selected", {
                    type: "upload",
                    value: this.$refs.file.files[0],
                });
            },
        },
    };
</script>
