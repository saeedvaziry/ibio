<template>
    <v-modal ref="modal">
        <form @submit.prevent="add" enctype="multipart/form-data">
            <div class="p-4">
                <v-title small class="mb-5">Add new link</v-title>
                <v-input name="title" label="Title" v-model="form.title" class="mb-4" :error="$page.props.errors.create && $page.props.errors.create.title"></v-input>
                <v-input name="url" label="URL" v-model="form.url" placeholder="http://example.com" class="mb-4" :error="$page.props.errors.create && $page.props.errors.create.url"></v-input>
            </div>
            <div class="px-4 py-3 flex justify-end">
                <v-button type="secondary" @click="$refs.modal.hide()">Cancel</v-button>
                <v-button class="ml-2" @click="add" :loading="adding">Add</v-button>
            </div>
        </form>
    </v-modal>
</template>

<script>
    export default {
        name: 'AddLink',
        data() {
            return {
                form: {
                    type: 'text',
                    title: '',
                    url: ''
                },
                adding: false
            }
        },
        methods: {
            show() {
                this.$refs.modal.show();
            },
            async add() {
                this.adding = true;
                let formData = new FormData();
                formData.append('type', this.form.type);
                formData.append('title', this.form.title);
                formData.append('url', this.form.url);
                await this.$inertia.post(route('page-settings.links'), formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                });
                if (this.$page.props.flash.success) {
                    this.$refs.modal.hide();
                }
                this.adding = false;
            }
        }
    }
</script>
