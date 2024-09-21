// resources/js/stores/jobStore.js

import { defineStore } from 'pinia';
import axios from 'axios';

export const useJobStore = defineStore('job', {
    state: () => ({
        jobs: [],
    }),
    actions: {
        async fetchJobs() {
            try {
                const response = await axios.get('/api/jobs'); // Adjust the endpoint if necessary
                this.jobs = response.data;
            } catch (error) {
                console.error('Failed to fetch jobs:', error);
            }
        },
        // Add more actions as needed
    },
});
