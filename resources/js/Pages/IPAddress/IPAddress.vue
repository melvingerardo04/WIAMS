<script setup>
import { defineProps, ref } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import axios from 'axios';
import DangerButton from '@/Components/DangerButton.vue';

const props = defineProps({
    ipAddresses: Array,
    auth: Object
});

const deleteIPAddress = async (id) => {
    if (confirm('Are you sure you want to delete this IP address?')) {
        try {
            await axios.delete(`/ipAddress/${id}`);
            window.location.reload();
        } catch (error) {
            console.error('Error deleting IP address:', error);
            alert('Failed to delete IP address. Please try again later.');
        }
    }
};
</script>

<template>
    <Head title="IP Address" />

    <AuthenticatedLayout>
        <div class="py-12">  
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <Link
                            :href="route('ipAddress.create')"
                            class="ml-4 inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:outline-none focus:border-gray-700 focus:ring focus:ring-gray-200 active:bg-gray-600 disabled:opacity-25 transition"
                        > Add IP Address
                        </Link>
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">IP Address V4</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">IP Address V6</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created By</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr v-for="(ipAddress, index) in ipAddresses" :key="ipAddress.id">
                                    <td class="px-6 py-4 whitespace-nowrap">{{ index + 1 }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ ipAddress.label }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ ipAddress.ip_v4 }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ ipAddress.ip_v6 }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ ipAddress.name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <Link v-if="props.auth.user.id == ipAddress.user_id" :href="`/ipAddress/${ipAddress.id}/edit`" class="inline-flex items-center rounded-md border border-transparent bg-green-600 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 active:bg-green-700">Edit</Link>
                                        <DangerButton   @click="deleteIPAddress(ipAddress.id)" class="text-red-600 hover:text-red-900 ml-4">Delete</DangerButton>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>