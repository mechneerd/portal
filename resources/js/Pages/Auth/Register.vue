<script setup>
import { ref,reactive } from 'vue';
import { Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    image:null,
});

const error = ref('');

const submitForm = () => {
    form.post('/register',{
        onError: ()=>{
            form.reset('password','password_confirmation')
        }
    });

};
</script>

<!-- resources/js/Pages/Register.vue -->
<template>
    <div class="flex items-center justify-center min-h-screen bg-gray-500">
        <div class="bg-white p-6 rounded shadow-md w-96">
            <h2 class="text-2xl font-bold mb-4 text-center">Register</h2>
            <form @submit.prevent="submitForm">
                                
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Profile Image</label>
                    <input type="file" @input="form.image = $event.target.files[0]" />
                    <div v-if="form.errors.image">{{ form.errors.image }}</div>
                </div>
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <InputText
                        type="text"
                        id="name"
                        v-model="form.name"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        
                    />
                    <div v-if="form.errors.name">{{ form.errors.name }}</div>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <InputText
                        type="email"
                        id="email"
                        v-model="form.email"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        
                    />
                    <div v-if="form.errors.email">{{ form.errors.email }}</div>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <InputText
                        type="password"
                        id="password"
                        v-model="form.password"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        
                    />
                    <div v-if="form.errors.password">{{ form.errors.password }}</div>
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <InputText
                        type="password"
                        id="password_confirmation"
                        v-model="form.password_confirmation"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        
                    />
                </div>
                <button
                    type="submit"
                    class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700"
                >
                    Register
                </button>

                <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                      Already have an account? <Link href="/login" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login here</Link>
                  </p>
            </form>
        </div>
    </div>
</template>

<style scoped>
/* Additional styles if needed */
</style>
