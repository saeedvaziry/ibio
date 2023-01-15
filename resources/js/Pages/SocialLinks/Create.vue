<template>
    <v-button @click="modal = true">Add new Link</v-button>
    <v-dialog-modal max-width="2xl" :show="modal" @close="modal = false">
        <template #title>Add new Link</template>
        <template #content>
            <div class="col-span-6 sm:col-span-3">
                <v-label for="platform" value="Platform" />
                <v-select
                    id="platform"
                    name="platform"
                    v-model="form.platform"
                    class="mt-2 w-full"
                >
                    <option v-for="item in $page.props.platforms" :value="item" class="capitalize">{{ item }}</option>
                </v-select>
                <v-input-error :message="form.errors.platform" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-3 mt-3">
                <v-label for="url" value="URL" />
                <v-input
                    type="text"
                    id="url"
                    name="url"
                    v-model="form.url"
                    :value="form.url"
                    class="mt-2 w-full"
                />
                <v-input-error :message="form.errors.url" class="mt-2" />
            </div>
        </template>
        <template #footer>
            <v-secondary-button @click="modal = false">Cancel</v-secondary-button>
            <v-button
                class="ml-2"
                @click="save"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Save
            </v-button>
        </template>
    </v-dialog-modal>
</template>

<script>
    import VButton from "@/Components/Button";
    import VDialogModal from "@/Components/DialogModal";
    import VDialogForm from "@/Components/DialogForm";
    import VSecondaryButton from "@/Components/SecondaryButton";
    import VLabel from "@/Components/Label";
    import VInput from "@/Components/Input";
    import VInputError from "@/Components/InputError";
    import VSelect from "@/Components/Select.vue";

    export default {
        components: {
            VSelect,
            VInputError,
            VInput,
            VLabel,
            VSecondaryButton,
            VDialogForm,
            VDialogModal,
            VButton,
        },
        data() {
            return {
                modal: false,
                form: this.$inertia.form({
                    platform: '',
                    url: '',
                }),
            };
        },
        methods: {
            save() {
                this.form.post(route("social-links"), {
                    errorBag: "socialLink",
                    onSuccess: () => {
                        this.modal = false;
                        window.Emitter.emit("preview.reload", true);
                    },
                });
            },
        },
    };
</script>
