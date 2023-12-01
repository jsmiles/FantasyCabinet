<template>
  <div
    class="max-w-sm bg-white border border-slate-400 rounded-lg shadow hover:shadow-lg"
  >
    <img
      v-if="!selectedData"
      class="rounded-t-lg w-full h-auto max-h-48 object-cover"
      src="../assets/images/index.png"
      alt=""
    />
    <img
      v-else
      class="rounded-t-lg w-full h-auto max-h-48 object-cover"
      :src="selectedData.img_url"
      alt=""
    />
    <div class="p-5">
      <p
        v-if="!selectedData"
        class="mb-3 font-normal text-gray-700 dark:text-gray-400"
      >
        Make your choice Below
      </p>
      <p
        v-else
        class="text-xl font-semibold flex justify-center mb-3 text-gray-700 dark:text-gray-400"
      >
        {{ selectedData.name }}
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

const { role, selectedData } = defineProps(['role', 'selectedData']);
</script>
