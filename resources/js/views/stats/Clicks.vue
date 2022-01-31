<template>
    <stats>
        <v-card padding="0" v-if="$page.props.links.length > 0">
            <div v-for="(link, i) in $page.props.links" :key="i" class="p-4 border-gray-100 dark:border-gray-800" :class="{'border-b-2': i !== $page.props.links.length - 1}">
                <div class="flex w-full items-center justify-between">
                    <div class="flex items-center">
                        <img v-if="['social', 'contact'].includes(link.type) && link.title" :src="require(`../../../img/${link.title}.svg`).default" width="20" class="mr-1" alt="">
                        <img v-else :src="require(`../../../img/${link.type}.svg`).default" width="20" class="mr-1" alt="">
                        <a :href="link.real_url" rel="noreferrer" target="_blank" class="text-gray-700 w-28 md:w-62 truncate" :class="{'capitalize': ['social', 'contact'].includes(link.type) }">{{ link.display_title }}</a>
                        <span class="text-sm mr-1 text-gray-400">({{ link.clicks }} کلیک)</span>
                    </div>
                    <div class="flex items-center">
                        <v-button type="secondary" small @click="$inertia.visit(route('stats.clicks.show', {link: link.id}))">
                            <fa-icon :icon="['fas', 'chart-bar']" class="ml-0 md:ml-2"></fa-icon>
                            <span class="hidden md:block">مشاهده آمار</span>
                        </v-button>
                    </div>
                </div>
                <div class="line-chart flex w-full items-center justify-between" v-if="$page.props.link && $page.props.link.id === link.id">
                    <clicks-chart :chart-data="$page.props.link.stats" border-width="4" class="h-20 md:h-40 mx-auto" :show-detail="true"></clicks-chart>
                </div>
            </div>
        </v-card>
        <v-card class="text-center" v-else>
            <p class="text-lg mb-3">هنوز هیچ لینکی نداری</p>
            <p class="text-gray-500 mb-3">اولین لینکتو اضافه کن 🎉</p>
            <v-button type="secondary" small @click="$inertia.visit(route('page-settings.links'))">افزودن لینک</v-button>
        </v-card>
    </stats>
</template>

<script>
    import ClicksChart from "./partials/ClicksChart";

    export default {
        name: "Clicks",
        components: {ClicksChart}
    }
</script>
