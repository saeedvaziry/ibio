<template>
    <app-layout>
        <v-container>
            <v-card class="flex w-full flex-col items-center justify-between md:flex-row">
                <div class="mb-3 flex flex-col items-center md:mb-0 md:flex-row">
                    <v-avatar
                        :user="$page.props.user"
                        :with-email="false"
                        :with-name="false"
                        class="mr-3"
                        width="12"
                        height="12"
                    ></v-avatar>
                    <div class="flex flex-col justify-center">
                        <div class="sm:text-md mb-1 text-center text-sm md:text-right md:text-lg">
                            {{ $page.props.user.name }}
                        </div>
                        <div class="md:text-md text-xs text-gray-500 sm:text-sm">
                            ibio.link/{{ $page.props.user.username }}
                        </div>
                    </div>
                </div>
                <div class="flex items-center">
                    <v-button-copy
                        type="secondary"
                        :copy-text="`ibio.link/${$page.props.user.username}`"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                        </svg>
                        Copy Address
                        <template #copied>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                            Copy Address
                        </template>
                    </v-button-copy>
                </div>
            </v-card>
        </v-container>
    </app-layout>
</template>

<script>
    import AppLayout from "@/Layouts/AppLayout";
    import VCard from "@/Components/Card";
    import VAvatar from "@/Components/Avatar";
    import VButtonCopy from "@/Components/ButtonCopy";
    import VContainer from "@/Components/Container";

    export default {
        name: "Dashboard",
        components: { VContainer, VButtonCopy, VAvatar, VCard, AppLayout },
    };
</script>
