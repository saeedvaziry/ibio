<script>
    import {Pie} from 'vue-chartjs';

    export default {
        name: "VisitsByDevice",
        extends: Pie,
        props: ['chartData'],
        mounted() {
            let bgColor = ['#a1dde1', '#a3cdf8', '#deb2f4', '#f7addb'];
            if (this.$root.theme === 'dark' || (this.$root.theme === 'system' && this.$root.system_theme === 'dark')) {
                bgColor = ['rgba(49,218,229,0.47)', 'rgba(41,127,215,0.53)', 'rgba(154,54,204,0.56)', 'rgba(210,49,149,0.47)']
            }
            this.renderChart({
                labels: ['موبایل', 'تبلت', 'دسکتاپ', 'ناشناس'],
                datasets: [
                    {
                        label: 'بازدید ها به تفکیک دستگاه',
                        backgroundColor: bgColor,
                        borderColor: 'rgba(0,0,0,0)',
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
