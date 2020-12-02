<template>
    <dashboard>
        <v-card class="w-full flex items-center justify-between mb-5">
            <div class="flex items-center">
                <v-avatar :user="$page.props.user" :size="20" class="mr-5" font="2xl"></v-avatar>
                <div class="flex flex-col justify-center">
                    <div class="text-lg font-bold mb-1">{{ $page.props.user.name }}</div>
                    <div class="text-md font-bold text-gray-500">ibio.link/{{ $page.props.user.username }}</div>
                </div>
            </div>
            <div class="flex items-center">
                <v-button type="secondary" small>
                    <fa-icon :icon="['fas', 'link']" class="mr-1 text-gray-700"></fa-icon>
                    Copy Link
                </v-button>
            </div>
        </v-card>
        <v-card class="w-full flex items-center justify-between">
            <v-title small>Today's visitors</v-title>
            <span class="text-xl font-bold">{{ $page.props.todayVisits }}</span>
        </v-card>
    </dashboard>
</template>

<script>
    export default {
        name: 'DashboardIndex'
    }
</script>
