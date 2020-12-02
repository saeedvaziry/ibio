<template>
    <dashboard>
        <div class="flex items-center justify-between mb-5">
            <v-title>Links</v-title>
            <v-button type="color" color="purple" small v-if="links.length > 0" @click="$inertia.visit(route('links.create'))">Create a Link</v-button>
        </div>
        <template v-if="links.length > 0">
            <draggable v-model="links" @end="sorted" handle=".move" ghost-class="bg-gray-50">
                <transition-group type="transition" name="flip-list">
                    <v-card v-for="link in links" :key="link.id" class="mb-3 flex items-center justify-between" padding="p-5">
                        <div class="flex flex-col justify-center">
                            <div class="text-lg font-semibold">{{ link.title }}</div>
                            <div class="text-xs text-gray-500">{{ link.url }}</div>
                        </div>
                        <div class="flex items-center">
                            <v-button class="mr-3" small type="secondary" color="yellow" @click="$inertia.visit(route('links.destroy', {link: link.id}), {method: 'delete'})">
                                Delete
                            </v-button>
                            <v-button class="mr-3" small type="secondary" color="purple" @click="$inertia.visit(route('links.edit', {link: link.id}))">
                                Edit
                            </v-button>
                            <fa-icon :icon="['fas', 'arrows-alt-v']" class="text-2xl move text-gray-400 cursor-move"></fa-icon>
                        </div>
                    </v-card>
                </transition-group>
            </draggable>
        </template>
        <v-card class="text-center" v-else>
            <p class="text-lg font-semibold mb-3">You don't have any links yet</p>
            <p class="text-gray-500 mb-3">Create your first link here 🎉</p>
            <v-button type="secondary" small @click="$inertia.visit(route('links.create'))">Create a Link</v-button>
        </v-card>
    </dashboard>
</template>

<script>
    import draggable from 'vuedraggable';

    export default {
        name: 'Links',
        components: {
            draggable
        },
        data() {
            return {
                links: this.$page.props.links
            }
        },
        methods: {
            sorted() {
                this.$inertia.post(route('links.sort'), {
                    links: this.links
                });
            }
        }
    }
</script>
