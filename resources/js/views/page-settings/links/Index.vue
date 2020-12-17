<template>
    <page-settings>
        <add-link ref="add"></add-link>
        <draggable v-model="$page.props.links" @end="sorted" handle=".move" ghost-class="bg-gray-50">
            <transition-group type="transition" name="flip-list">
                <div v-for="link in $page.props.links" :key="link.id">
                    <edit-link :link="link" v-if="$page.props.link && $page.props.link.id === link.id"></edit-link>
                    <v-card v-else class="mb-3 flex items-center justify-between" padding="p-5">
                        <div class="flex flex-col justify-center">
                            <div class="text-lg flex items-center">
                                <img :src="require('../../../../img/' + link.type + '.svg')" width="20" class="ml-2" alt="">
                                <div>{{ link.title }}</div>
                            </div>
                            <div class="text-xs text-gray-500 break-all" style="max-width: 300px">{{ link.url }}</div>
                        </div>
                        <div class="flex items-center hidden md:flex">
                            <v-button class="ml-3" small type="secondary" color="yellow" @click="$inertia.visit(route('links.destroy', {link: link.id}), {method: 'delete'})">
                                حذف
                            </v-button>
                            <v-button class="ml-3" small type="secondary" color="purple" @click="$inertia.visit(route('page-settings.links.show', {link: link.id}), {preserveScroll: true, preserveState: false, only: ['link']})">
                                ویرایش
                            </v-button>
                            <fa-icon :icon="['fas', 'arrows-alt-v']" class="text-2xl move text-gray-400 cursor-move"></fa-icon>
                        </div>
                        <div class="flex items-center md:hidden">
                            <fa-icon :icon="['fas', 'pencil-alt']" class=" text-gray-400 cursor-pointer" @click="$refs.edit.show(link)"></fa-icon>
                            <fa-icon :icon="['fas', 'trash']" class=" text-gray-400 cursor-pointer ml-3" @click="$inertia.visit(route('links.destroy', {link: link.id}), {method: 'delete'})"></fa-icon>
                            <fa-icon :icon="['fas', 'arrows-alt-v']" class=" move text-gray-400 cursor-move ml-3"></fa-icon>
                        </div>
                    </v-card>
                </div>
            </transition-group>
        </draggable>
    </page-settings>
</template>

<script>
    import draggable from 'vuedraggable';
    import AddLink from "./Add";
    import EditLink from "./Edit";

    export default {
        name: 'Links',
        components: {
            EditLink,
            AddLink,
            draggable
        },
        methods: {
            sorted() {
                this.$inertia.post(route('page-settings.links.sort'), {
                    links: this.$page.props.links
                });
            }
        }
    }
</script>
