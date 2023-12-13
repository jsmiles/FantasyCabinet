<script setup>
import { ref, onMounted, watch } from 'vue';
import apiClient from '../services/api';
import { useRoute } from 'vue-router';

const data = ref([]);
const route = useRoute();

const fetchData = async (id) => {
  try {
    const response = await apiClient.get(`show/${id}`);
    data.value = response.data.data;
  } catch (error) {
    console.error('Error fetching data:', error);
  }
};

onMounted(() => {
  fetchData(route.params.id);
});

watch(
  () => route.params.id,
  (newId, oldId) => {
    fetchData(newId);
  }
);
</script>

<template>
  <div
    class="max-w-md m-2 bg-white rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 border border-slate-400 flex mx-auto my-8 hover:shadow-lg"
  >
    <div class="p-5 flex col">
      <div class="flex row gap-8">
        <div class="w-1/2 relative">
          <img
            class="rounded-lg object-cover w-full h-full"
            :src="data.img_url"
          />
        </div>
        <div class="w-1/2">
          <h5
            class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
          >
            {{ data.name }}
          </h5>
          <h5
            class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white"
          >
            {{ data.role }}
          </h5>
          <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            Served as {{ data.role }} between {{ data.role_started }} and
            {{ data.role_ended }}. Was born in {{ data.county_of_birth }} and
            studied at {{ data.undergraduate_university }}. Was a representative
            at that time for {{ data.constituency }}.
          </p>
        </div>
      </div>
    </div>
  </div>
</template>
