<template>
    <app-layout>
        <v-container>
            <v-section-title>
                <template #title>Themes</template>
                <template #description>You can select your page's theme or customize it</template>
            </v-section-title>
            <div class="mt-5 grid grid-cols-2 md:grid-cols-3 gap-5">
                <v-card v-for="theme in $page.props.themes" padding="p-0" card-class="group">
                    <div class="relative flex items-center justify-center">
                        <theme-preview
                            :theme="theme"
                            class="h-[250px] w-full rounded-t-xl transition"
                        />
                    </div>
                    <div class="p-3">
                        <div class="flex items-center text-center text-gray-700 capitalize">
                            {{ theme.name }}
                            <svg
                                v-if="$page.props.user.theme_id === theme.id"
                                xmlns="http://www.w3.org/2000/svg"
                                class="ml-1 h-5 w-5 text-primary-700"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </div>
                        <v-secondary-button
                            @click="pickTheme(theme)"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing || $page.props.user.theme_id === theme.id"
                            :full="true"
                            class="mt-3"
                        >
                            Select This
                        </v-secondary-button>
                    </div>
                </v-card>
            </div>
        </v-container>
    </app-layout>
</template>

<script>
    import AppLayout from "@/Layouts/AppLayout";
    import VContainer from "@/Components/Container";
    import VSectionTitle from "@/Components/SectionTitle";
    import VCard from "@/Components/Card";
    import VButton from "@/Components/Button";
    import VSecondaryButton from "@/Components/SecondaryButton";
    import ThemePreview from "@/Pages/Appearance/ThemePreview.vue";

    export default {
        components: {ThemePreview, VSecondaryButton, VButton, VCard, VSectionTitle, VContainer, AppLayout },
        data() {
            return {
                form: this.$inertia.form({}),
            };
        },
        methods: {
            pickTheme(theme) {
                this.form.post(route("appearance.themes.pick", { theme: theme }), {
                    errorBag: "pickTheme",
                    preserveScroll: (page) => Object.keys(page.props.errors).length,
                    onSuccess() {
                        window.Emitter.emit("preview.reload", true);
                    },
                });
            },
        },
    };
</script>
