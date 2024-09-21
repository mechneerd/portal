<!-- resources/js/Pages/JobPosting.vue -->
<template>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white p-6 rounded shadow-md w-96">
            <h2 class="text-2xl font-bold mb-4 text-center">Create Job Posting</h2>
            <form @submit.prevent="submitForm">
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Job Title</label>
                    <InputText
                        id="title"
                        v-model="form.title"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        required
                    />
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Job Description</label>
                    <InputTextarea
                        id="description"
                        v-model="form.description"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        required
                    />
                </div>

                <div class="mb-4">
                    <label for="company_name" class="block text-sm font-medium text-gray-700">Company Name</label>
                    <InputText
                        id="company_name"
                        v-model="form.company_name"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        required
                    />
                </div>

                <div class="mb-4">
                    <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                    <InputText
                        id="location"
                        v-model="form.location"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        required
                    />
                </div>

                <div class="mb-4">
                    <label for="salary" class="block text-sm font-medium text-gray-700">Salary</label>
                    <InputNumber v-model="form.salary" inputId="currency-india" mode="currency" currency="INR" currencyDisplay="code" locale="en-IN" fluid />
                </div>

                <div class="mb-4">
                    <label for="job_type" class="block text-sm font-medium text-gray-700">Job Type</label>
                    <Listbox
                        id="job_type"
                        v-model="form.job_type"
                        :options="jobTypes"
                        optionLabel="label"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        placeholder="Select Job Type"
                    />
                </div>

                
    <div class="mb-4">
        <label for="skills" class="block text-sm font-medium text-gray-700">Skills</label>
        <MultiSelect v-model="selectedCities" display="chip" :options="cities" optionLabel="name" filter placeholder="Select Cities"
            :maxSelectedLabels="3" class="w-full md:w-80" />
    </div>

    <div class="field">
                    <label for="logo">Company Logo</label>

                    <input type="file" @input="form.logo = $event.target.files[0]" />
                   
                </div>

                <button
                    type="submit"
                    class="mt-5 w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700"
                >
                    Create Post
                </button>
                
            </form>
        </div>
    </div>
</template>

<script setup>
import { ref, reactive } from 'vue';
import {useForm} from '@inertiajs/vue3';

const form = useForm({
    title: '',
    logo:null,
    description: '',
    company_name: '',
    location: '',
    salary: '',
    job_type: null,
});
const selectedCities = ref();
const cities = ref([
    { name: 'New York', code: 'NY' },
    { name: 'Rome', code: 'RM' },
    { name: 'London', code: 'LDN' },
    { name: 'Istanbul', code: 'IST' },
    { name: 'Paris', code: 'PRS' }
]);
const jobTypes = [
    { label: 'Full-time', value: 'full-time' },
    { label: 'Part-time', value: 'part-time' },
    { label: 'Contract', value: 'contract' },
];

const error = ref('');

const submitForm = () => {
    // Here you would typically make an API call to submit the form data
//console.log('Submitting Form', form);
    form.post('/post');
    // Reset form or show success message after submission
};
</script>

<style scoped>
/* Add any additional styles if needed */
</style>
