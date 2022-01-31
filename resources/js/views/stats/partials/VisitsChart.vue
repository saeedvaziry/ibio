<script>
    import {Line} from 'vue-chartjs'

    export default {
        extends: Line,
        name: "VisitsChart",
        props: ['chartData'],
        mounted() {
            let bgColor = '#fad9da';
            if (this.$root.theme === 'dark' || (this.$root.theme === 'system' && this.$root.system_theme === 'dark')) {
                bgColor = 'rgba(201,45,50,0.45)'
            }
            this.renderChart({
                labels: this.getLabels(),
                datasets: [
                    {
                        label: 'بازدید ها',
                        backgroundColor: bgColor,
                        data: this.getData(),
                        borderWidth: 5,
                        borderColor: ['#f85752'],
                        fill: true
                    },
                ]
            }, {
                legend: {
                    display: false
                },
                title: 'آمار بازدید ها',
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            display: false,
                            beginAtZero: true,
                            callback: function (value) {
                                if (value % 1 === 0) {
                                    return value;
                                }
                            },
                            max: Math.max.apply(Math, this.getData()) + 1
                        },
                        gridLines: {
                            display: false
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            display: false
                        },
                        gridLines: {
                            display: false
                        }
                    }]
                },
                layout: {
                    padding: {
                        bottom: -20,
                        left: -10
                    }
                }
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
                let data = [];
                this.chartData.map((item) => {
                    data.push(item.visits);
                });
                return data;
            }
        }
    }
</script>
