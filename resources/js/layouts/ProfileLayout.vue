<template>
    <app-layout>
        <template #header>
            <slot name="header"></slot>
        </template>

        <template #sidebar>
            <div class="w-64">
                <div class="flex items-center bg-white border-b border-gray-100">
                    <div class="h-16 flex items-center justify-start px-4">
                        {{ $page.props.user.name }}
                    </div>
                </div>
                <div class="p-4">
                    <second-sidebar-link
                        :href="route('pages')"
                        :icon="['fas', 'sitemap']"
                        :active="route().current('pages') || route().current('pages.create')"
                        class="mb-3">My Pages
                    </second-sidebar-link>
                </div>
            </div>
        </template>

        <div class="px-8">
            <slot></slot>
        </div>
    </app-layout>
</template>

<script>
    import VSidebar from "@/Components/Sidebar";
    import VSidebarItem from "@/Components/SidebarItem";
    import AppLayout from "@/Layouts/AppLayout";
    import SecondSidebarLink from "@/Components/SecondSidebarLink";

    export default {
        name: "ProfileLayout",
        components: {
            SecondSidebarLink,
            AppLayout,
            VSidebarItem,
            VSidebar
        },
    }
</script>
