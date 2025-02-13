<script setup>
import { defineProps, ref } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    ipAddress: Array
});

const form = useForm({
    ip_v4: props.ipAddress.ip_v4,
    ip_v6: props.ipAddress.ip_v6,
    label: props.ipAddress.label,
    comment: props.ipAddress.comment
});



const updateUser = () => {
    form.put(`/ipAddress/${props.user.id}`);
};
</script>

<template>
    <Head title="Edit User" />

    <AuthenticatedLayout>
        <template>
            <div>
                <h1>Edit User</h1>
            </div>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="updateUser">
                            <div>
                                <label for="ip_v4">IP Address V4</label>
                                <input v-model="form.ip_v4" type="text" name="ip_v4" id="ip_v4" class="mt-1 block w-full" required>
                            </div>
                            <div class="mt-4">
                                <label for="ip_v6">IP Address V6</label>
                                <input v-model="form.ip_v6" type="text" name="ip_v6" id="ip_v6" class="mt-1 block w-full" required>
                            </div>
                            <div class="mt-4">
                                <label for="Label">Label</label>
                                <input v-model="form.label" type="text" name="label" id="label" class="mt-1 block w-full" required>
                            </div>
                            <div class="mt-4">
                                <label for="Comment">Comment</label>
                                <input v-model="form.comment" type="text" name="comment" id="comment" class="mt-1 block w-full" required>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 disabled:opacity-25 transition">Update</button>
                                <Link :href="route('ipAddress')" class="ml-4 inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:outline-none focus:border-gray-700 focus:ring focus:ring-gray-200 active:bg-gray-600 disabled:opacity-25 transition">Cancel</Link>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
