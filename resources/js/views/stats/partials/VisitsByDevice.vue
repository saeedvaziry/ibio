<script>
    import {Pie} from 'vue-chartjs';

    export default {
        name: "VisitsByDevice",
        extends: Pie,
        props: ['chartData'],
        mounted() {
            this.renderChart({
                labels: ['Mobile', 'Tablet', 'Desktop', 'Unknown'],
                datasets: [
                    {
                        label: 'Visits by device',
                        backgroundColor: ['#a1dde1', '#a3cdf8', '#deb2f4', '#f7addb'],
                        data: this.getData()
                    },
                ]
            }, {
                legend: {
                    display: true,
                    position: 'bottom'
                },
                title: 'Visits by device',
                responsive: true,
                maintainAspectRatio: false,
            });
        },
        methods: {
            getLabels() {
                let labels = [];
                this.chartData.map((item) => {
                    labels.push(item.date);
                });
                return labels;
            },
            getData() {
                let data = [0, 0, 0, 0];
                this.chartData.map((item) => {
                    switch (item.device) {
                        case 'mobile':
                            data[0] = item.visits;
                            break;
                        case 'tablet':
                            data[1] = item.visits;
                            break;
                        case 'desktop':
                            data[2] = item.visits;
                            break;
                        case 'unknown':
                            data[3] = item.visits;
                            break;

                    }
                });
                return data;
            }
        }
    }
</script>

<style scoped>
    canvas {
        height: 300px !important;
    }
</style>
