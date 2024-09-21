<script setup>
import { Link } from '@inertiajs/vue3';
import { defineProps, onMounted, onBeforeUnmount, reactive } from 'vue';
import { router } from '@inertiajs/vue3'

const props = defineProps({
  auth: Object,
});
const profile = reactive({
  isOpen:false,
})

const logout = ()=>{
  router.post('/logout');
}


const pmenu = () =>{
  profile.isOpen =!profile.isOpen;
}

const outsideclick =(e)=>{
  (profile.isOpen &&!e.target.closest('.relative') && !e.target.closest('#user-menu-button')) ? profile.isOpen=false:'';
}
onMounted(()=>{
  document.addEventListener('click',outsideclick);
})

onBeforeUnmount(()=>{
  document.removeEventListener('click',outsideclick);
})
</script>

<!-- resources/js/Layouts/DefaultLayout.vue -->
<template>
  <div v-if="auth.user">
    <nav class="bg-gradient-to-r from-purple-600 to-blue-500">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="/image/layout/icons8-logo-250.png" class="h-8" alt="Flowbite Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Portal</span>
      </a>
  
      <div class="flex md:order-2 ml-auto space-x-3 md:space-x-0 rtl:space-x-reverse">
        <button @click="pmenu" type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
          <span class="sr-only">Open user menu</span>
          <img class="w-8 h-8 rounded-full" :src="`/storage/${auth.user.image}`" alt="user photo">
        </button>
        <div class="relative inline-block text-left">
          <div v-if="profile.isOpen" class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md">
            <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
              <Link href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Profile Page</Link>
              <Link href="/settings" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Settings</Link>
              <button @click="logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Logout</button>
            </div>
          </div>
        </div>
      </div>
  
      <!-- Rest of your nav content -->
  
      <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
        <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
          <li v-if="auth.user">
            <Link href="/" aria-current="page">Home</Link>
          </li>
          <li v-if="!auth.user">
            <Link href="/login" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Login</Link>
          </li>
          <li v-if="!auth.user">
            <Link href="/register" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Register</Link>
          </li>
          <li v-if="auth.user">
            <button @click="logout" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Logout</button>
          </li>
          <li v-if="auth.user">
            <Link href="/post" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Post Job</Link>
          </li>
          <li v-if="auth.user">
            <Link href="/postindex" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Post Job</Link>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  </div>

   
  <slot/>
  
  </template>
  
