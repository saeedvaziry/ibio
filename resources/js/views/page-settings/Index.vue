<template>
    <dashboard>
        <v-title class="mb-5">Page Settings</v-title>
        <v-card class="mb-5">
            <v-title class="mb-5" small>Edit Username</v-title>
            <form>
                <v-input name="username" label="Username" v-model="$page.props.user.username" class="mb-4"></v-input>
                <v-button>Save</v-button>
            </form>
        </v-card>
        <v-card class="mb-5">
            <v-title class="mb-5" small>Social Links</v-title>
            <div class="text-center">
                <p class="text-lg font-semibold mb-3">You haven't set any social media links</p>
                <p class="text-gray-500 mb-3">Add your social media links 🎉</p>
                <v-button type="secondary" small>Add links</v-button>
            </div>
        </v-card>
    </dashboard>
</template>

<script>
    export default {
        name: 'PageSettings'
    }
</script>
