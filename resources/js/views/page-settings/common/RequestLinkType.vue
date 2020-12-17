<template>
    <v-modal ref="modal">
        <form @submit.prevent="submit">
            <div class="p-4">
                <v-title small class="mb-5">ما رو در جریان بذارید</v-title>
                <v-textarea name="description" v-model="form.description" :error="$page.props.errors.requestLinkType && $page.props.errors.requestLinkType.description" label="لطفا بهمون بگین که کدوم مورد رو فراموش کردیم اضافه کنیم 🧐"></v-textarea>
            </div>
            <div class="px-4 py-3 flex justify-end">
                <v-button type="secondary" @click="$refs.modal.hide()">انصراف</v-button>
                <v-button class="mr-2" @click="submit" :loading="submitting">ثبت</v-button>
            </div>
        </form>
    </v-modal>
</template>

<script>
    export default {
        name: 'RequestLinkType',
        data() {
            return {
                form: {
                    description: '',
                },
                submitting: false
            }
        },
        methods: {
            show() {
                this.$refs.modal.show();
            },
            async submit() {
                this.submitting = true;
                await this.$inertia.post(route('feature-requests.link-type'), this.form, {
                    preserveState: true,
                    preserveScroll: true
                });
                if (this.$page.props.flash.success) {
                    this.$refs.modal.hide();
                }
                this.submitting = false;
            }
        }
    }
</script>
