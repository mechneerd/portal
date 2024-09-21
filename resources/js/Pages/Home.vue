<template>
  <div>
      <h1 v-if="auth.user">Welcome, {{ auth.user.name }}</h1>
      <h1 v-else>Please log in.</h1>
  </div>
</template>

<script setup>
import { defineProps } from 'vue';

const props = defineProps({
  auth: Object,
});
</script>
