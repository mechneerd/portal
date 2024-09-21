<!-- resources/js/Pages/Login.vue -->
<template>
    <div class="flex items-center justify-center min-h-screen bg-gray-500">
        <div class="bg-white p-6 rounded shadow-md w-96">
            <h2 class="text-2xl font-bold mb-4 text-center">Login</h2>
            <form @submit.prevent="submitForm">
                <FloatLabel class="mb-10">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <InputText
                        type="email"
                        id="email"
                        v-model="form.email"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        required
                    />
                </FloatLabel>
                <FloatLabel class="mb-10">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <InputText
                        type="password"
                        id="password"
                        v-model="form.password"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        required
                    />
                </FloatLabel>
                <button
                    type="submit"
                    class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700"
                >
                    Login
                </button>

                <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                      Don’t have an account yet? <Link href="/register" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</Link>
                  </p>
                  
            </form>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { Link, useForm } from '@inertiajs/vue3';


const form = useForm({
    email: '',
    password: '',
});

const error = ref('');

const submitForm = () => {
  form.post('/login',{
    onError:()=>{
        form.reset('email','password');
    }
  })
};
</script>

<style scoped>
/* Additional styles if needed */
</style>
