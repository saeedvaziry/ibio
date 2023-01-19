<template>
    <div class="min-h-screen bg-gray-50">
        <!--<v-banner />-->

        <div class="flex min-h-screen">
            <div
                class="left-0 top-0 min-h-screen w-12 flex-none border-r border-gray-200 bg-white lg:block lg:w-64"
            >
                <div
                    class="flex h-16 items-center justify-start border-b border-gray-200 px-1 lg:px-4"
                >
                    <v-authentication-card-logo />
                </div>

                <div class="py-4 px-1 lg:px-4">
                    <!--<v-sidebar-item-->
                    <!--    :href="route('dashboard')"-->
                    <!--    :active="route().current('dashboard')"-->
                    <!--&gt;-->
                    <!--    <template #icon>-->
                    <!--        <svg-->
                    <!--            xmlns="http://www.w3.org/2000/svg"-->
                    <!--            class="h-5 w-5"-->
                    <!--            fill="none"-->
                    <!--            viewBox="0 0 24 24"-->
                    <!--            stroke="currentColor"-->
                    <!--            stroke-width="2"-->
                    <!--        >-->
                    <!--            <path-->
                    <!--                stroke-linecap="round"-->
                    <!--                stroke-linejoin="round"-->
                    <!--                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"-->
                    <!--            />-->
                    <!--        </svg>-->
                    <!--    </template>-->
                    <!--    Dashboard-->
                    <!--</v-sidebar-item>-->
                    <v-sidebar-item :href="route('links')" :active="route().current('links')">
                        <template #icon>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"
                                />
                            </svg>
                        </template>
                        Links
                    </v-sidebar-item>
                    <v-sidebar-item
                        :href="route('social-links')"
                        :active="route().current('social-links')"
                    >
                        <template #icon>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"
                                />
                            </svg>
                        </template>
                        Social Links
                    </v-sidebar-item>
                    <!--<v-sidebar-item :href="route('settings')" :active="route().current('settings')">-->
                    <!--    <template #icon>-->
                    <!--        <svg-->
                    <!--            xmlns="http://www.w3.org/2000/svg"-->
                    <!--            class="h-5 w-5"-->
                    <!--            fill="none"-->
                    <!--            viewBox="0 0 24 24"-->
                    <!--            stroke="currentColor"-->
                    <!--            stroke-width="2"-->
                    <!--        >-->
                    <!--            <path-->
                    <!--                stroke-linecap="round"-->
                    <!--                stroke-linejoin="round"-->
                    <!--                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"-->
                    <!--            />-->
                    <!--            <path-->
                    <!--                stroke-linecap="round"-->
                    <!--                stroke-linejoin="round"-->
                    <!--                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"-->
                    <!--            />-->
                    <!--        </svg>-->
                    <!--    </template>-->
                    <!--    Settings-->
                    <!--</v-sidebar-item>-->
                    <v-sidebar-item
                        :href="route('appearance')"
                        :active="route().current('appearance')"
                    >
                        <template #icon>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"
                                />
                            </svg>
                        </template>
                        Appearance
                    </v-sidebar-item>
                    <v-sidebar-item :href="route('profile')" :active="route().current('profile')">
                        <template #icon>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                />
                            </svg>
                        </template>
                        Profile
                    </v-sidebar-item>
                    <v-sidebar-item :href="route('metrics')" :active="route().current('metrics')">
                        <template #icon>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M8 13v-1m4 1v-3m4 3V8M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"
                                />
                            </svg>
                        </template>
                        Page Metrics
                    </v-sidebar-item>
                </div>
            </div>

            <div
                class="min-h-screen w-64 flex-none border-r border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900"
                v-if="$slots.sidebar"
            >
                <slot name="sidebar"></slot>
            </div>

            <div class="flex max-h-screen flex-grow flex-col">
                <nav class="h-16 border-b border-gray-200 bg-white">
                    <!-- Primary Navigation Menu -->
                    <div class="mx-auto max-w-full px-4">
                        <div class="flex h-full items-center justify-between">
                            <div class="flex items-center justify-center">
                                <v-secondary-button :small="true" @click="openMyPage">
                                    My Page
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
                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"
                                        />
                                    </svg>
                                </v-secondary-button>
                            </div>

                            <div class="flex items-center">
                                <div class="relative">
                                    <v-dropdown align="right" width="48">
                                        <template #trigger>
                                            <div
                                                class="flex cursor-pointer items-center justify-between"
                                            >
                                                <v-avatar
                                                    :user="$page.props.user"
                                                    :with-email="true"
                                                    class="hidden lg:inline-flex"
                                                    image-class="w-10 h-10"
                                                ></v-avatar>
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-6 w-6 lg:hidden"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M4 6h16M4 12h16M4 18h16"
                                                    />
                                                </svg>
                                                <svg
                                                    class="ml-2 -mr-0.5 hidden h-4 w-4 lg:block"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </div>
                                        </template>

                                        <template #content>
                                            <!-- Account Management -->
                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                Manage Account
                                            </div>

                                            <v-dropdown-link :href="route('profile')"> Profile</v-dropdown-link>

                                            <div class="border-t border-gray-100"></div>

                                            <!-- Authentication -->
                                            <form @submit.prevent="logout" class="mb-0">
                                                <v-dropdown-link as="button">
                                                    Log Out
                                                </v-dropdown-link>
                                            </form>
                                        </template>
                                    </v-dropdown>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>

                <div
                    class="flex h-full flex-grow items-center justify-between overflow-y-hidden bg-white"
                >
                    <main class="h-full w-full border-r border-gray-200 bg-gray-50">
                        <!--<header class="border-b border-gray-200 bg-white" v-if="$slots.header">-->
                        <!--    <div-->
                        <!--        class="mx-auto flex h-16 w-full max-w-full items-center justify-between px-4 text-xl"-->
                        <!--    >-->
                        <!--        <slot name="header"></slot>-->
                        <!--    </div>-->
                        <!--</header>-->

                        <!--<header class="border-b border-gray-200 bg-white" v-if="$slots.header2">-->
                        <!--    <div class="mx-auto max-w-full py-6 px-8">-->
                        <!--        <slot name="header2"></slot>-->
                        <!--    </div>-->
                        <!--</header>-->

                        <div class="max-h-full overflow-y-scroll pb-20">
                            <div class="bg-yellow-200 h-12 flex items-center justify-start px-5 text-yellow-700" v-if="!$page.props.user.username">
                                You haven't set your username yet! You can set it from <a :href="route('profile')" class="ml-1 text-black">here</a>
                            </div>
                            <slot></slot>
                        </div>
                    </main>

                    <preview v-if="$page.props.preview && $page.props.user.username" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import VApplicationMark from "@/Components/ApplicationMark";
    import VBanner from "@/Components/Banner";
    import VDropdown from "@/Components/Dropdown";
    import VDropdownLink from "@/Components/DropdownLink";
    import VNavLink from "@/Components/NavLink";
    import VResponsiveNavLink from "@/Components/ResponsiveNavLink";
    import VInput from "@/Components/Input";
    import VAvatar from "@/Components/Avatar";
    import VSearch from "@/Components/Search";
    import VAuthenticationCardLogo from "@/Components/AuthenticationCardLogo";
    import Preview from "@/Pages/Links/Preview";
    import VSidebar from "@/Components/Sidebar";
    import VSidebarItem from "@/Components/SidebarItem";
    import VSecondaryButton from "@/Components/SecondaryButton";

    export default {
        components: {
            VSecondaryButton,
            VSidebarItem,
            VSidebar,
            Preview,
            VAuthenticationCardLogo,
            VSearch,
            VAvatar,
            VInput,
            VApplicationMark,
            VBanner,
            VDropdown,
            VDropdownLink,
            VNavLink,
            VResponsiveNavLink,
        },

        data() {
            return {
                showingNavigationDropdown: false,
            };
        },

        created() {
            document.onkeydown = (e) => {
                window.Emitter.emit("key.down", e);
            };
        },

        mounted() {
            document.title = this.$page.props.title + " | IBio";
        },

        methods: {
            openMyPage() {
                window.open(this.$page.props.user.url, "_blank");
            },

            logout() {
                this.$inertia.post(route("logout"));
            },
        },
    };
</script>
