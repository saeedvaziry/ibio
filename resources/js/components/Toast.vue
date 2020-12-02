<template>
    <transition enter-active-class="transition ease-out duration-300" enter-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to-class="opacity-100 translate-y-0 sm:scale-100" leave-active-class="transition ease-in duration-200" leave-class="opacity-100 translate-y-0 sm:scale-100" leave-to-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
        <div v-show="show" class="fixed bottom-0 left-0 sm:left-auto right-0 md:right-0 m-5 cursor-pointer z-50" @click="hideToast">
            <div class="text-white py-3 px-6 w-full h-full rounded-lg text-center" :class="{'bg-green-500': type === 'success', 'bg-red-500': type === 'error'}">{{ message }}</div>
        </div>
    </transition>
</template>

<script>
    export default {
        name: 'Toast',
        data() {
            return {
                show: false,
                type: '',
                message: '',
                timeout: null
            }
        },
        watch: {
            '$page.props.uuid': function () {
                if (this.$page.props.flash.success) {
                    this.showToast('success', this.$page.props.flash.success);
                }
                if (this.$page.props.flash.error) {
                    this.showToast('error', this.$page.props.flash.error);
                }
            }
        },
        created() {
            if (this.$page.props.flash.success) {
                this.showToast('success', this.$page.props.flash.success);
            }
            if (this.$page.props.flash.error) {
                this.showToast('error', this.$page.props.flash.error);
            }
        },
        methods: {
            showToast(type, message) {
                this.hideToast();
                this.type = type;
                this.message = message;
                this.show = true;
                this.timeout = setTimeout(function () {
                    this.show = false;
                }.bind(this), 5000);
            },
            hideToast() {
                this.show = false;
                if (this.timeout) {
                    clearTimeout(this.timeout);
                }
            }
        }
    }
</script>
