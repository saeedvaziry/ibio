<template>
    <dashboard>
        <v-card>
            <v-title class="mb-5" small>Edit link</v-title>
            <form @submit.prevent="edit" enctype="multipart/form-data">
                <!--<v-select label="Link type" :value="form.type" @selected="form.type = $event" :data="types" class="mb-4" :error="$page.props.errors.create && $page.props.errors.create.type"></v-select>-->
                <v-input name="title" label="Title" v-model="form.title" class="mb-4" :error="$page.props.errors.create && $page.props.errors.create.title"></v-input>
                <v-input name="url" label="URL" v-model="form.url" placeholder="http://example.com" class="mb-4" :error="$page.props.errors.create && $page.props.errors.create.url"></v-input>
                <!--<v-input label="Image" type="file" ref="image" :error="$page.props.errors.create && $page.props.errors.create.image"></v-input>-->
                <div class="flex mt-8">
                    <v-button :loading="updating" @click="edit" class="mr-2">Save</v-button>
                    <v-button type="secondary" @click="$inertia.visit(route('links'))">Cancel</v-button>
                </div>
            </form>
        </v-card>
    </dashboard>
</template>

<script>
    export default {
        name: 'EditLink',
        mounted() {
            this.form = {
                type: this.$page.props.link.type,
                title: this.$page.props.link.title,
                url: this.$page.props.link.url,
            }
        },
        data() {
            return {
                form: {
                    type: this.$page.props.link.type,
                    title: '',
                    url: '',
                },
                updating: false,
                types: [
                    {
                        title: 'Text',
                        value: 'text',
                    },
                ]
            }
        },
        methods: {
            async edit() {
                this.updating = true;
                let formData = new FormData();
                formData.append('type', this.form.type);
                formData.append('title', this.form.title);
                formData.append('url', this.form.url);
                await this.$inertia.put(route('links.edit', {link: this.$page.props.link.id}), this.form);
                this.updating = false;
            }
        }
    }
</script>
