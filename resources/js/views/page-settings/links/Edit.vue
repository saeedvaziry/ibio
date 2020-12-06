<template>
    <v-modal ref="modal">
        <form @submit.prevent="save" enctype="multipart/form-data">
            <div class="p-4">
                <v-title small class="mb-5">Add new link</v-title>
                <v-input name="title" label="Title" v-model="form.title" class="mb-4" :error="$page.props.errors.create && $page.props.errors.create.title"></v-input>
                <v-input name="url" label="URL" v-model="form.url" placeholder="http://example.com" class="mb-4" :error="$page.props.errors.create && $page.props.errors.create.url"></v-input>
            </div>
            <div class="px-4 py-3 flex justify-end">
                <v-button type="secondary" @click="$refs.modal.hide()">Cancel</v-button>
                <v-button class="ml-2" @click="save" :loading="saving">Save</v-button>
            </div>
        </form>
    </v-modal>
</template>

<script>
    export default {
        name: 'EditLink',
        data() {
            return {
                link: {},
                form: {
                    type: 'text',
                    title: '',
                    url: ''
                },
                saving: false
            }
        },
        methods: {
            show(link) {
                this.link = link;
                this.form.type = link.type;
                this.form.title = link.title;
                this.form.url = link.url;
                this.$refs.modal.show();
            },
            async save() {
                this.saving = true;
                let formData = new FormData();
                formData.append('type', this.form.type);
                formData.append('title', this.form.title);
                formData.append('url', this.form.url);
                await this.$inertia.post(route('page-settings.links.edit', {link: this.link.id}), formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                });
                if (this.$page.props.flash.success) {
                    this.$refs.modal.hide();
                }
                this.saving = false;
            }
        }
    }
</script>
