<script>
    import {Line} from 'vue-chartjs'

    export default {
        extends: Line,
        name: "VisitsChart",
        props: ['chartData'],
        mounted() {
            this.renderChart({
                labels: this.getLabels(),
                datasets: [
                    {
                        label: 'Visits',
                        backgroundColor: '#fad9da',
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
                title: 'Visits stats',
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
