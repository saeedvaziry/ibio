<template>
    <app-layout>
        <v-container>
            <div>
                <update-profile-information-form :user="$page.props.user" />
            </div>

            <div>
                <update-password-form class="mt-10 sm:mt-0" />
            </div>

            <div>
                <two-factor-authentication-form class="mt-10 sm:mt-0" />
            </div>

            <logout-other-browser-sessions-form :sessions="sessions" class="mt-10 sm:mt-0" />

            <delete-user-form class="mt-10 sm:mt-0" />
        </v-container>
    </app-layout>
</template>

<script>
    import DeleteUserForm from "./DeleteUserForm";
    import VSectionBorder from "@/Components/SectionBorder";
    import LogoutOtherBrowserSessionsForm from "./LogoutOtherBrowserSessionsForm";
    import TwoFactorAuthenticationForm from "./TwoFactorAuthenticationForm";
    import UpdatePasswordForm from "./UpdatePasswordForm";
    import UpdateProfileInformationForm from "./UpdateProfileInformationForm";
    import AppLayout from "@/Layouts/AppLayout";
    import VContainer from "@/Components/Container";

    export default {
        props: ["sessions"],

        components: {
            VContainer,
            AppLayout,
            DeleteUserForm,
            VSectionBorder,
            LogoutOtherBrowserSessionsForm,
            TwoFactorAuthenticationForm,
            UpdatePasswordForm,
            UpdateProfileInformationForm,
        },

        mounted() {
            document.title = "Profile";
        },
    };
</script>
