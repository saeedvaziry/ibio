<script>
    import {Line} from 'vue-chartjs'

    export default {
        extends: Line,
        name: "ClicksChart",
        props: ['chartData', 'borderWidth', 'showDetail'],
        mounted() {
            let bgColor = '#e9d3f6';
            if (this.$root.theme === 'dark' || (this.$root.theme === 'system' && this.$root.system_theme === 'dark')) {
                bgColor = 'rgba(145,27,213,0.44)'
            }
            this.renderChart({
                labels: this.getLabels(),
                datasets: [
                    {
                        label: 'کلیک ها',
                        backgroundColor: bgColor,
                        data: this.getData(),
                        borderWidth: this.borderWidth,
                        borderColor: ['#cb55ee'],
                        fill: true
                    },
                ]
            }, {
                legend: {
                    display: this.showDetail
                },
                title: 'آمار کلیک ها',
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            display: this.showDetail,
                            beginAtZero: true,
                            callback: function (value) {
                                if (value % 1 === 0) {
                                    return value;
                                }
                            },
                            max: Math.max.apply(Math, this.getData()) + 1
                        },
                        gridLines: {
                            display: this.showDetail
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
                        bottom: !this.showDetail ? -20 : 0,
                        left: !this.showDetail ? -10 : 0
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
                    data.push(item.clicks);
                });
                return data;
            }
        }
    }
</script>
