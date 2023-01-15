<template>
    <app-layout>
        <v-container>
            <v-section-title>
                <template #title>Social Links</template>
                <template #description>
                    Your social links will appear at the bottom of your page
                </template>
                <template #aside>
                    <div class="flex items-center justify-end">
                        <v-dropdown>
                            <template #trigger>
                                <v-secondary-button class="mr-3">
                                    Position
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="ml-1 h-5 w-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M19 9l-7 7-7-7"
                                        />
                                    </svg>
                                </v-secondary-button>
                            </template>
                            <template #content>
                                <v-dropdown-link as="button" @click="updatePosition('top')">
                                    <div class="flex items-center justify-between">
                                        <span>Top</span>
                                        <svg
                                            v-if="$page.props.user.social_links_position === 'top'"
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5 text-primary-600"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M5 13l4 4L19 7"
                                            />
                                        </svg>
                                    </div>
                                </v-dropdown-link>
                                <v-dropdown-link as="button" @click="updatePosition('bottom')">
                                    <div class="flex items-center justify-between">
                                        <span>Bottom</span>
                                        <svg
                                            v-if="$page.props.user.social_links_position === 'bottom'"
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5 text-primary-600"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M5 13l4 4L19 7"
                                            />
                                        </svg>
                                    </div>
                                </v-dropdown-link>
                            </template>
                        </v-dropdown>
                        <create />
                    </div>
                </template>
            </v-section-title>
            <div class="mt-5 grid grid-cols-1 gap-5">
                <v-card
                    v-for="(link, i) in $page.props.links"
                    :key="i"
                    class="flex items-center justify-between"
                >
                    <div class="flex items-center">
                        <img
                            :src="require(`../../../img/brands/${link.data['platform']}.svg`).default"
                            width="30"
                            class="mr-2"
                            alt=""
                        />
                        <a class="text-sm capitalize" :href="link.data['url']" ref="nofollow" target="_blank">
                            {{ link.data['platform'] }}
                        </a>
                    </div>
                    <div class="text-center">
                        <delete :link="link" />
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
    import VInput from "@/Components/Input";
    import VDropdown from "@/Components/Dropdown";
    import VDropdownLink from "@/Components/DropdownLink";
    import Create from "@/Pages/SocialLinks/Create.vue";
    import Delete from "@/Pages/SocialLinks/Delete.vue";

    export default {
        components: {
            Delete,
            Create,
            VDropdownLink,
            VDropdown,
            VInput,
            VSecondaryButton,
            VButton,
            VCard,
            VSectionTitle,
            VContainer,
            AppLayout,
        },
        mounted() {
            this.filterResult = this.$page.props.socialMedias;
        },
        data() {
            return {
                positionForm: this.$inertia.form({
                    position: this.$page.props.user.social_links_position,
                }),
                setMedia: "",
                adding: false,
                filter: "",
                filterResult: [],
            };
        },
        watch: {
            "$page.props.socialMedias": function (newVal) {
                this.filterResult = newVal;
            },
            filter(newVal) {
                this.filterResult = [];
                this.$page.props.socialMedias.map((item) => {
                    let data = item.title.toLowerCase() + " " + item.value.toLowerCase();
                    if (data.indexOf(newVal) >= 0) {
                        this.filterResult.push(item);
                    }
                });
            },
        },
        methods: {
            updatePosition(position) {
                this.positionForm.position = position;
                this.positionForm.post(route("user.social-links-position"), {
                    onSuccess: () => {
                        window.Emitter.emit("preview.reload", true);
                    },
                });
            },
        },
    };
</script>
