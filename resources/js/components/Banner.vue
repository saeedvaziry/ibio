<template>
    <div></div>
</template>

<script>
    import toastr from "toastr";

    export default {
        name: "VBanner",

        created() {
            toastr.options = {
                closeButton: false,
                newestOnTop: false,
                progressBar: false,
                positionClass: "toast-bottom-right",
                preventDuplicates: true,
                onclick: null,
                showDuration: "300",
                hideDuration: "1000",
                timeOut: "5000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
            };
        },

        watch: {
            "$page.props.flash": function (newVal) {
                if (newVal && newVal.bannerStyle && newVal.banner) {
                    if (newVal.bannerStyle === "danger") {
                        newVal.bannerStyle = "error";
                    }
                    toastr[newVal.bannerStyle](newVal.banner);
                }
            },
        },

        mounted() {
            window.Emitter.on("banner", (style, message) => {
                if (style === "danger") {
                    style = "error";
                }
                toastr[style](message);
            });
        },

        unmounted() {
            window.Emitter.off("banner");
        },

        computed: {
            style() {
                if (this.forceStyle) {
                    return this.forceStyle;
                }
                return this.$page.props.flash?.bannerStyle || "success";
            },

            message() {
                if (this.forceStyle) {
                    return this.forceMessage;
                }
                return this.$page.props.flash?.banner || "";
            },
        },
    };
</script>

<style scoped>
    .banner {
        left: 50%;
        transform: translateX(-50%);
        min-width: 400px;
    }
</style>
