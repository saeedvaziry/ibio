<template>
    <dashboard>
        <template v-if="$page.props.user.username">
            <v-card class="w-full flex flex-col md:flex-row items-center justify-between mb-5">
                <div class="flex flex-col md:flex-row items-center mb-3 md:mb-0">
                    <v-avatar :user="$page.props.user" size="w-10 h-10 md:w-20 md:h-20" font="text-md md:text-2xl" class="mb-2 md:mb-0 md:ml-5" upload></v-avatar>
                    <div class="flex flex-col justify-center">
                        <div class="text-sm sm:text-md md:text-lg mb-1 text-center md:text-right">{{ $page.props.user.name }}</div>
                        <div class="text-xs sm:text-sm md:text-md text-gray-500">ibio.link/{{ $page.props.user.username }}
                            <fa-icon :icon="['fas', 'pencil-alt']" class="ml-1 cursor-pointer" @click="$inertia.visit(route('page-settings.info'))"></fa-icon>
                        </div>
                    </div>
                </div>
                <div class="flex items-center">
                    <v-button-copy type="secondary" small :copy-text="`ibio.link/${$page.props.user.username}`">
                        <fa-icon :icon="['fas', 'link']" class="ml-1 text-gray-700"></fa-icon>
                        کپی آدرس
                    </v-button-copy>
                </div>
            </v-card>
            <template v-if="$page.props.hasVisits">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mb-5">
                    <v-card class="line-chart w-full mb-3 sm:mb-0" padding="0">
                        <div class="flex items-center justify-between p-3 md:p-6">
                            <v-title small class="p-0">بازدید ها</v-title>
                        </div>
                        <visits-chart :chart-data="$page.props.visits" class="h-20"></visits-chart>
                    </v-card>
                    <v-card class="line-chart w-full" padding="0">
                        <div class="flex items-center justify-between mb-8 md:mb-0 p-3 md:p-6">
                            <v-title small class="p-0">کلیک ها</v-title>
                        </div>
                        <clicks-chart :chart-data="$page.props.clicks" border-width="5" class="h-20"></clicks-chart>
                    </v-card>
                </div>
                <v-card padding="0" v-if="$page.props.recentClicks.length > 0">
                    <div class="flex items-center justify-between border-b-2 border-gray-100 dark:border-gray-700 p-3 md:p-6">
                        <v-title small class="p-0">کلیک های اخیر</v-title>
                        <v-button type="secondary" small @click="$inertia.visit(route('stats.clicks'))">
                            <fa-icon :icon="['fas', 'chart-bar']" class="ml-2"></fa-icon>
                            مشاهده آمار
                        </v-button>
                    </div>
                    <table class="min-w-full divide-y divide-gray-100">
                        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-100 dark:divide-gray-800 text-gray-600 dark:text-gray-300">
                        <tr v-for="(stat, i) in $page.props.recentClicks" :key="i" class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="px-6 py-4 whitespace-nowrap flex items-center">
                                <img v-if="['social', 'contact'].includes(stat.statable.type) && stat.statable.title" :src="require(`../../img/${stat.statable.title}.svg`).default" width="20" class="ml-2" alt="">
                                <a :href="stat.statable.real_url" rel="noreferrer" target="_blank" class="text-gray-700 dark:text-gray-300" :class="{'capitalize': ['social', 'contact'].includes(stat.statable.type) }">{{ stat.statable.display_title }}</a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap"></td>
                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                <div class="flex items-center justify-end">
                                    <div class="flex items-center ml-2" v-if="stat.country && stat.country !== '-'">
                                        <img class="h-5" :src="`/static/images/country-flags/${stat.country}.svg`" alt="">
                                    </div>
                                    <div class="flex items-center justify-center w-5">
                                        <template v-if="stat.is_mobile">
                                            <fa-icon :icon="['fas', 'mobile-alt']" class="fa-w"></fa-icon>
                                        </template>
                                        <template v-if="stat.is_desktop">
                                            <fa-icon :icon="['fas', 'desktop']" class="fa-w"></fa-icon>
                                        </template>
                                        <template v-if="stat.is_tablet">
                                            <fa-icon :icon="['fas', 'tablet-alt']" class="fa-w"></fa-icon>
                                        </template>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </v-card>
                <v-card class="text-center" v-else>
                    <p class="text-lg mb-3">هنوز کسی روی لینکات کلیک نکرده ☹️</p>
                    <p class="text-gray-500 mb-3">آدرست رو با دوستات به اشتراک بذار</p>
                    <v-button-copy type="secondary" small :copy-text="`ibio.link/${$page.props.user.username}`">
                        <fa-icon :icon="['fas', 'link']" class="ml-1 text-gray-700"></fa-icon>
                        کپی آدرس
                    </v-button-copy>
                </v-card>
            </template>
            <v-card class="text-center" v-else>
                <p class="text-lg mb-3">هیچ بازدید کننده ای نداشتی ☹️</p>
                <p class="text-gray-500 mb-3">آدرست رو با دوستات به اشتراک بذار</p>
                <v-button-copy type="secondary" small :copy-text="`ibio.link/${$page.props.user.username}`">
                    <fa-icon :icon="['fas', 'link']" class="mr-1 text-gray-700"></fa-icon>
                    کپی آدرس
                </v-button-copy>
            </v-card>
        </template>
        <template v-else>
            <v-card class="mb-5 bg-yellow-50" border="border-yellow-200">
                <div class="flex items-center justify-between">
                    <p class="ml-3">نام کاربریت رو انتخاب نکردی هنوز!</p>
                    <v-button type="color" color="yellow" small @click="$inertia.visit(route('page-settings.info'))">همین الان انتخاب کن</v-button>
                </div>
            </v-card>
        </template>
    </dashboard>
</template>

<script>
    import VisitsChart from "./stats/partials/VisitsChart";
    import ClicksChart from "./stats/partials/ClicksChart";

    export default {
        name: 'DashboardIndex',
        components: {ClicksChart, VisitsChart}
    }
</script>
