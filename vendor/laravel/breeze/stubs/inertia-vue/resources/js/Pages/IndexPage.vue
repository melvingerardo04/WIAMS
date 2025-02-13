<template>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
        <h1 class="text-3xl font-bold mb-6">Welcome</h1>
        <div class="space-x-4">
            <button @click="goToLogin" class="px-6 py-2 bg-blue-500 text-white rounded-lg">Login</button>
            <button @click="goToRegister" class="px-6 py-2 bg-green-500 text-white rounded-lg">Register</button>
        </div>
    </div>
</template>

<script>
import { usePage, router } from '@inertiajs/vue3';

export default {
    setup() {
        const goToLogin = () => {
            router.get('/login');
        };
        const goToRegister = () => {
            router.get('/register');
        };

        return { goToLogin, goToRegister };
    }
};
</script>

<style scoped>
button:hover {
    opacity: 0.8;
}
</style>
