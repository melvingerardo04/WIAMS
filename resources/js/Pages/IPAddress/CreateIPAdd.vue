<script setup>
import { useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    auth: Object,
});

const form = useForm({
    ip_v4: '',
    ip_v6: '',
    label: '',
    comment: '',
    created_by: String(props.auth.user.id),
});

const submit = () => {
    form.post('/ipAddress');
};
</script>

<template>
    <Head title="Add IP Address" />

    <AuthenticatedLayout>
 
            
        
            <div class="py-12">  
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div>
                            <h1>Add IP Address</h1>
                            <br>
                            <form @submit.prevent="submit">
                                <div>
                                    <label for="ip_v4">IP Address V4</label>
                                    <input class="mt-1 block w-full form-control"  v-model="form.ip_v4" type="text" id="ip_v4" />
                                </div>
                                <div>
                                    <label for="ip_v6">IP Address V6</label>
                                    <input class="mt-1 block w-full form-control"  v-model="form.ip_v6" type="text" id="ip_v6" />
                                </div>
                                <div>
                                    <label for="label">Label</label>
                                    <input class="mt-1 block w-full form-control"  v-model="form.label" type="text" id="label" />
                                </div>
                                <div>
                                    <label for="comment">Comment</label>
                                    <input class="mt-1 block w-full form-control"  v-model="form.comment" type="text" id="comment" />
                                </div>
                                <input v-model="form.created_by" type="hidden" id="created_by" />
                             <PrimaryButton class="mt-4">Add IP Address</PrimaryButton>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>