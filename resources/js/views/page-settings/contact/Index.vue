<template>
    <page-settings>
        <div class="relative flex items-center mb-5">
            <v-input class="w-full" placeholder="فیلتر" v-model="filter"></v-input>
            <div class="absolute left-0 ml-4 text-red-500" v-if="filterResult.length === 0">
                <span class="cursor-pointer" @click="$refs.requestLinkType.show()">نبود؟</span>
            </div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
            <v-card v-for="(contact, i) in filterResult" :key="i" class="flex flex-col items-center justify-between">
                <img :src="require(`../../../../img/${contact.value}.svg`).default" width="30" class="mb-4" alt="">
                <div class="text-center">
                    <h2 class="text-sm mb-4">{{ contact.title }}</h2>
                    <v-button :type="contact.link ? 'color' : 'secondary'" color="purple" small @click="showSet(contact)">{{ contact.link ? 'ویرایش' : 'افزودن' }}</v-button>
                </div>
            </v-card>
        </div>
        <v-modal ref="addModal">
            <div class="p-4" v-if="setContact">
                <v-title small class="mb-5">{{ setContact.link ? 'ویرایش' : 'افزودن' }} {{ setContact.title }}</v-title>
                <v-input input-class="ltr" :placeholder="setContact.placeholder" v-model="form.url" :value="form.url" :error="$page.props.errors.add && $page.props.errors.add.url ? 'وارد کردن این فیلد الزامیه' : ''" class="mb-4"></v-input>
            </div>
            <div class="px-4 py-3 flex justify-end">
                <v-button type="secondary" @click="$refs.addModal.hide()">انصراف</v-button>
                <v-button class="mr-2" @click="add" :loading="adding">{{ setContact.link ? 'ویرایش' : 'افزودن' }}</v-button>
            </div>
        </v-modal>
        <request-link-type ref="requestLinkType"></request-link-type>
    </page-settings>
</template>

<script>
    import RequestLinkType from "../common/RequestLinkType";
    export default {
        name: 'PageContact',
        components: {RequestLinkType},
        mounted() {
            this.filterResult = this.$page.props.contacts;
        },
        data() {
            return {
                form: {
                    contact: '',
                    url: ''
                },
                setContact: '',
                adding: false,
                filter: '',
                filterResult: []
            }
        },
        watch: {
            '$page.props.contacts': function (newVal) {
                this.filterResult = newVal;
            },
            filter(newVal) {
                this.filterResult = [];
                this.$page.props.contacts.map((item) => {
                    let data = item.title.toLowerCase() + ' ' + item.value.toLowerCase();
                    if (data.indexOf(newVal) >= 0) {
                        this.filterResult.push(item);
                    }
                });
            }
        },
        methods: {
            showSet(contact) {
                this.setContact = contact;
                this.form.contact = contact.value;
                this.form.url = contact.link ? contact.link.url : ''
                this.$refs.addModal.show();
            },
            async add() {
                this.adding = true;
                await this.$inertia.post(route('page-settings.contact'), this.form, {
                    preserveScroll: true
                });
                if (this.$page.props.flash.success) {
                    this.$refs.addModal.hide();
                }
                this.adding = false;
            }
        }
    }
</script>
