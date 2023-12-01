<script setup>
import DropdownFilter from './DropdownFilter.vue';
import SearchBar from './SearchBar.vue';
import { ref, onMounted, watchEffect } from 'vue';
import { RouterLink } from 'vue-router';
import apiClient from '../services/api';

const emit = defineEmits();
const data = ref([]);
const buttonContainer = ref(null);
const dropdownMenu = ref(null);
const menuPosition = ref({});

const selectHandler = (role, data) => {
  emit('select', { role, data });
};

watchEffect(() => {
  if (buttonContainer.value && dropdownMenu.value) {
    const buttonRect = buttonContainer.value.getBoundingClientRect();
    menuPosition.value = {
      top: buttonRect.bottom + window.scrollY + 'px',
      left: buttonRect.left + window.scrollX + 'px',
    };
  }
});

const fetchData = async () => {
  try {
    const response = await apiClient.get('/');
    data.value = response.data.data;
  } catch (error) {
    console.error('Error fetching data:', error);
  }
};

onMounted(fetchData);
</script>

<template>
  <div
    class="relative overflow-x-auto shadow-md sm:rounded-lg hover:shadow-xl border border-slate-400"
  >
    <div
      class="bg-white flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4"
    >
      <div class="m-2" ref="buttonContainer">
        <DropdownFilter />
      </div>

      <SearchBar />
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
          <th scope="col" class="px-6 py-3"></th>
          <th scope="col" class="px-6 py-3">Name</th>
          <th scope="col" class="px-6 py-3">Role</th>
          <th scope="col" class="px-6 py-3">Took Office</th>
          <th scope="col" class="px-6 py-3">Left Office</th>
          <th scope="col" class="px-6 py-3"></th>
        </tr>
      </thead>
      <tbody>
        <!-- Iteration start point -->
        <tr
          v-for="d in data"
          :key="d.id"
          class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
        >
          <td
            scope="row"
            class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white"
          >
            <img :src="d.img_url" height="60" width="40" />
          </td>
          <td class="px-6 py-2">{{ d.name }}</td>
          <td class="px-6 py-2">{{ d.role }}</td>
          <td class="px-6 py-2">{{ d.role_started }}</td>
          <td class="px-6 py-2">{{ d.role_ended }}</td>
          <td class="px-6 py-2">
            <RouterLink
              :to="`/show/${d.id}`"
              target="_blank"
              class="font-medium text-white bg-blue-500 mx-1 p-2 rounded hover:bg-blue-700"
            >
              Learn More
            </RouterLink>
            <RouterLink
              to="/"
              @click="selectHandler(d.role, d)"
              class="font-medium text-white bg-green-500 mx-1 p-2 rounded hover:bg-green-700"
            >
              Select
            </RouterLink>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
