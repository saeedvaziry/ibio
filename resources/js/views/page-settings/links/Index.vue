<template>
    <page-settings>
        <template v-if="$page.props.links.length > 0">
            <draggable v-model="$page.props.links" @end="sorted" handle=".move" ghost-class="bg-gray-50">
                <transition-group type="transition" name="flip-list">
                    <v-card v-for="link in $page.props.links" :key="link.id" class="mb-3 flex items-center justify-between" padding="p-5">
                        <div class="flex flex-col justify-center">
                            <div class="text-lg font-semibold">{{ link.title }}</div>
                            <div class="text-xs text-gray-500 break-all" style="max-width: 300px">{{ link.url }}</div>
                        </div>
                        <div class="flex items-center hidden md:flex">
                            <v-button class="mr-3" small type="secondary" color="yellow" @click="$inertia.visit(route('links.destroy', {link: link.id}), {method: 'delete'})">
                                Delete
                            </v-button>
                            <v-button class="mr-3" small type="secondary" color="purple" @click="$refs.edit.show(link)">
                                Edit
                            </v-button>
                            <fa-icon :icon="['fas', 'arrows-alt-v']" class="text-2xl move text-gray-400 cursor-move"></fa-icon>
                        </div>
                        <div class="flex items-center md:hidden">
                            <fa-icon :icon="['fas', 'pencil-alt']" class=" text-gray-400 cursor-pointer" @click="$refs.edit.show(link)"></fa-icon>
                            <fa-icon :icon="['fas', 'trash']" class=" text-gray-400 cursor-pointer ml-3" @click="$inertia.visit(route('links.destroy', {link: link.id}), {method: 'delete'})"></fa-icon>
                            <fa-icon :icon="['fas', 'arrows-alt-v']" class=" move text-gray-400 cursor-move ml-3"></fa-icon>
                        </div>
                    </v-card>
                </transition-group>
            </draggable>
            <v-button class="mt-8" small @click="$refs.add.show()">Add another link</v-button>
        </template>
        <v-card class="text-center" v-else>
            <p class="text-lg font-semibold mb-3">You don't have any links yet</p>
            <p class="text-gray-500 mb-3">Add your first link here 🎉</p>
            <v-button type="secondary" small @click="$refs.add.show()">Add a Link</v-button>
        </v-card>
        <add-link ref="add"></add-link>
        <edit-link ref="edit"></edit-link>
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
