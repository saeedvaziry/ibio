<template>
    <div
        :id="editorId"
        style="width: 100%; height: 100%"
        class="rounded-md border border-gray-300"
    ></div>
</template>
<script>
    export default {
        name: "VCodeEditor",
        props: {
            editorId: String,
            content: String,
            lang: String,
            theme: String,
            disabled: {
                type: Boolean,
                default: false,
            },
        },
        data() {
            return {
                editor: Object,
                beforeContent: "",
            };
        },
        watch: {
            content(value) {
                if (this.beforeContent !== value) {
                    this.editor.setValue(value, 1);
                }
            },
        },
        mounted() {
            const lang = this.lang || "text";
            const theme = this.theme || "github";

            this.editor = window.ace.edit(this.editorId);
            if (this.content) {
                this.editor.setValue(this.content, 1);
            }

            if (this.disabled) {
                this.editor.setReadOnly(true);
            }

            this.editor.getSession().setMode(`ace/mode/${lang}`);
            this.editor.setTheme(`ace/theme/${theme}`);
            this.editor.setFontSize("15px");

            this.editor.on("change", () => {
                this.beforeContent = this.editor.getValue();
                this.$emit("change-content", this.editor.getValue());
            });
        },
    };
</script>
