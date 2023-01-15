<template>
    <v-form-section @submitted="updateProfileInformation">
        <template #title> Profile Information</template>

        <template #description>
            Update your account's profile information and email address.
        </template>

        <template #form>
            <!-- Profile Photo -->
            <div class="col-span-6 sm:col-span-6">
                <div class="flex flex-col items-center justify-center">
                    <!-- Profile Photo File Input -->
                    <input type="file" class="hidden" ref="photo" @change="updatePhotoPreview" />

                    <!-- Current Profile Photo -->
                    <div class="mt-2" v-show="!photoPreview">
                        <v-avatar
                            image-class="h-20 w-20"
                            :user="$page.props.user"
                            :with-name="false"
                            :with-email="false"
                        />
                    </div>

                    <!-- New Profile Photo Preview -->
                    <div class="mt-2" v-show="photoPreview">
                        <span
                            class="block h-20 w-20 rounded-full"
                            :style="
                                'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' +
                                photoPreview +
                                '\');'
                            "
                        >
                        </span>
                    </div>

                    <div class="mt-5 flex items-center justify-center">
                        <v-secondary-button
                            class="mr-2"
                            type="button"
                            @click.prevent="selectNewPhoto"
                            small
                        >
                            Select a New Photo
                        </v-secondary-button>
                        <v-danger-button
                            type="button"
                            @click.prevent="deletePhoto"
                            v-if="user.avatar"
                            small
                        >
                            Remove Photo
                        </v-danger-button>
                    </div>
                </div>

                <v-input-error :message="form.errors.photo" class="mt-2" />
            </div>

            <!-- Username -->
            <div class="col-span-6 sm:col-span-6">
                <v-label for="username" value="Username" />
                <v-input
                    id="username"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.username"
                    autocomplete="username"
                />
                <v-input-error :message="form.errors.username" class="mt-2" />
            </div>

            <!-- Name -->
            <div class="col-span-6 sm:col-span-6">
                <v-label for="name" value="Name" />
                <v-input
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    autocomplete="name"
                />
                <v-input-error :message="form.errors.name" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-6">
                <v-label for="email" value="Email" />
                <v-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" />
                <v-input-error :message="form.errors.email" class="mt-2" />
            </div>

            <!-- Bio -->
            <div class="col-span-6 sm:col-span-6">
                <v-label for="bio" value="Bio" />
                <v-textarea id="bio" class="mt-1 block w-full" rows="5" v-model="form.bio"></v-textarea>
                <v-input-error :message="form.errors.bio" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <v-action-message :on="form.recentlySuccessful" class="mr-3"> Saved.</v-action-message>

            <v-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </v-button>
        </template>
    </v-form-section>
</template>

<script>
    import VButton from "@/Components/Button";
    import VFormSection from "@/Components/FormSection";
    import VInput from "@/Components/Input";
    import VInputError from "@/Components/InputError";
    import VLabel from "@/Components/Label";
    import VActionMessage from "@/Components/ActionMessage";
    import VSecondaryButton from "@/Components/SecondaryButton";
    import VAvatar from "@/Components/Avatar";
    import VDangerButton from "@/Components/DangerButton";
    import VTextarea from "@/Components/Textarea";

    export default {
        components: {
            VTextarea,
            VDangerButton,
            VAvatar,
            VActionMessage,
            VButton,
            VFormSection,
            VInput,
            VInputError,
            VLabel,
            VSecondaryButton,
        },

        props: ["user"],

        data() {
            return {
                form: this.$inertia.form({
                    _method: "PUT",
                    username: this.user.username,
                    name: this.user.name,
                    email: this.user.email,
                    bio: this.user.bio,
                    photo: null,
                }),

                photoPreview: null,
            };
        },

        methods: {
            updateProfileInformation() {
                if (this.$refs.photo) {
                    this.form.photo = this.$refs.photo.files[0];
                }

                this.form.post(route("user-profile-information.update"), {
                    errorBag: "updateProfileInformation",
                    preserveScroll: true,
                    onSuccess: () => this.clearPhotoFileInput(),
                });
            },

            selectNewPhoto() {
                this.$refs.photo.click();
            },

            updatePhotoPreview() {
                const photo = this.$refs.photo.files[0];

                if (!photo) return;

                const reader = new FileReader();

                reader.onload = (e) => {
                    this.photoPreview = e.target.result;
                };

                reader.readAsDataURL(photo);

                this.updateProfileInformation();
            },

            deletePhoto() {
                this.$inertia.delete(route("user.current-user-photo.destroy"), {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.photoPreview = null;
                        this.clearPhotoFileInput();
                    },
                });
            },

            clearPhotoFileInput() {
                if (this.$refs.photo?.value) {
                    this.$refs.photo.value = null;
                }
            },
        },
    };
</script>
