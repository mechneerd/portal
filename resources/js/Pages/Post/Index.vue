<template>
  <main class="flex flex-col items-center justify-center bg-gray-700 p-4">
    <div v-for="job in jobs" :key="job.id" class="group bg-gray-900 p-4 mb-4 transition-all duration-300 hover:rotate-1 lg:p-8 w-full max-w-md">
      <div class="mb-3 text-right">
        <button @click="deleteJob(job.id)" class="text-gray-50 transition-all duration-300 hover:scale-110 hover:text-red-600">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
            <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
          </svg>
        </button>
      </div>
    <div class="flex items-center gap-x-2">
  <img :src="`/storage/${job.logo}`" alt="Company Logo" class="h-10 w-10" />
  <div>
    <h3 class="text-xl font-bold text-gray-50">{{ job.company_name }}</h3>
    <p class="text-xs text-gray-300">{{ job.location }}</p> <!-- Changed to a paragraph -->
  </div>
</div>
      <div class="my-4">
        <h3 class="text-2xl font-medium text-gray-200">{{ job.title }}</h3>
        <div class="text-sm font-medium">
          <span  class="m-1 ml-0 inline-block text-blue-500">Skills array</span>
        </div>
        <div class="mt-2 text-sm text-gray-400">{{ job.salary }}</div>
      </div>
      <div class="flex items-center justify-between">
        <span class="text-sm font-medium text-gray-50">job type</span>
        <a class="font-medium text-blue-500 transition-all duration-300 group-hover:text-blue-500/80">Apply Now</a>
      </div>
    </div>
  </main>
</template>

<script setup>
import { defineProps } from 'vue';
//import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
  jobs: {
    type: Array,
    required: true,
  },
});

const deleteJob = (id) => {
  if (confirm('Are you sure you want to delete this job?')) {
    Inertia.delete(`/jobs/${id}`);
  }
};
</script>

<style scoped>
/* Add any additional styles if needed */
</style>
