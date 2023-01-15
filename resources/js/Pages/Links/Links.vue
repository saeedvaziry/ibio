<template>
    <div class="draggable">
        <draggable
            v-model="form.links"
            item-key="sort"
            v-bind="dragOptions"
            @start="drag = true"
            @end="updateSort"
            tag="div"
            handle=".draggable-handle"
        >
            <template #item="{ element }" :key="`link-` + element.id">
                <div class="mt-5 w-full rounded-xl   border border-gray-200 bg-white">
                    <single-link :link="element" :key="`link-` + element.id" />
                </div>
            </template>
        </draggable>
    </div>
</template>

<script>
    import draggable from "vuedraggable";
    import SingleLink from "@/Pages/Links/SingleLink";

    export default {
        name: "Links",
        components: { SingleLink, draggable },
        data() {
            return {
                drag: false,
                form: this.$inertia.form({
                    links: this.$page.props.links,
                }),
            };
        },
        watch: {
            "$page.props.links": function (newVal) {
                this.form.links = newVal;
                window.Emitter.emit("preview.reload", true);
            },
        },
        computed: {
            dragOptions() {
                return {
                    animation: 200,
                    group: "description",
                    disabled: false,
                    ghostClass: "opacity-50",
                };
            },
        },
        methods: {
            // sort() {
            //     this.form.links = this.form.links.sort((a, b) => a.sort - b.sort);
            // },
            updateSort() {
                this.drag = false;
                this.form.post(route("links.update-sort"), {});
            },
        },
    };
</script>
