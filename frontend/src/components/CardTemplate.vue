<template>
  <div
    class="max-w-sm bg-white border border-slate-400 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 hover:shadow-lg"
  >
    <img class="rounded-t-lg" src="../assets/images/index.png" alt="" />
    <div class="p-5">
      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
        Make your choice Below
      </p>
      <p
        class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white flex justify-center"
      >
        {{ role }}
      </p>
    </div>
  </div>
</template>

<script setup>
import { defineProps } from 'vue';

const props = defineProps(['role']);
</script>
