<script setup>
import { ref } from 'vue';
import { Bar } from 'vue-chartjs';
import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  BarElement,
  CategoryScale,
  LinearScale,
} from 'chart.js';

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale);

const props = defineProps({
  userCount: Number,
  ipAddressCount: Number,
});

const chartData = ref({
  labels: ['Users', 'IP Addresses'],
  datasets: [
    {
      label: 'Count',
      backgroundColor: ['#42A5F5', '#66BB6A'],
      data: [props.userCount, props.ipAddressCount],
    },
  ],
});

const chartOptions = ref({
  responsive: true,
  maintainAspectRatio: false,
});
</script>

<template>
  <div>
    <Bar :data="chartData" :options="chartOptions" />
  </div>
</template>

<style scoped>
.chart-container {
  position: relative;
  height: 400px;
}
</style>