<template>
    <v-card>
        <Line
            :chart-options="chartOptions"
            :chart-data="chartData"
            chart-id="visits"
            width="300"
            height="100"
        />
    </v-card>
</template>

<script>
    import { Line } from "vue-chartjs";
    import {
        Chart as ChartJS,
        Title,
        Tooltip,
        Legend,
        LineElement,
        LinearScale,
        PointElement,
        CategoryScale,
        Filler,
    } from "chart.js";
    import VCard from "@/Components/Card";

    ChartJS.register(Title, Tooltip, Legend, LineElement, LinearScale, PointElement, CategoryScale, Filler);

    export default {
        components: { VCard, Line },
        data() {
            return {
                chartData: {
                    labels: this.$page.props.visits.map((item) => item.date),
                    datasets: [
                        {
                            label: "Visits",
                            data: this.$page.props.visits.map((item) => item.value),
                            backgroundColor: "#f3e8ff",
                            borderWidth: 3,
                            borderColor: "#a855f7",
                            fill: true,
                            tension: 0.2,
                            legend: {
                                display: false
                            }
                        },
                    ],
                },
                chartOptions: {
                    responsive: true,
                    title: "Visits Metrics",
                    scales: {
                        y: {
                            beginAtZero: true,
                            max:
                                Math.max.apply(
                                    Math,
                                    this.$page.props.visits.map((item) => item.value)
                                ) + 1,
                            grid: {
                                color: '#f5f5f4'
                            }
                        },
                        x: {
                            grid: {
                                color: '#f5f5f4'
                            },
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                    }
                },
            };
        },
    };
</script>
