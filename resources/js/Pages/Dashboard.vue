// filepath: /home/melvin/WIAMS/resources/js/Pages/Dashboard.vue
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import UserIpChart from '@/Components/UserIpChart.vue';

const props = defineProps({
    userCount: Number,
    ipAddressCount: Number,
});
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">
            Welcome to WIAMS
          </div>
        </div>
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg mt-6">
          <div class="p-6 text-gray-900">
            <h2 class="text-2xl font-bold mb-4">User and IP Address Statistics</h2>
            <div class="chart-container">
              <UserIpChart :userCount="props.userCount" :ipAddressCount="props.ipAddressCount" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<style scoped>
.chart-container {
  position: relative;
  height: 400px;
}
</style>