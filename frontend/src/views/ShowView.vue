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

// Fetch data on component mount
onMounted(() => {
  fetchData(route.params.id);
});

// Watch for changes in the route and fetch data if the id changes
watch(
  () => route.params.id,
  (newId, oldId) => {
    fetchData(newId);
  }
);
</script>

<template>
  <div
    class="max-w-sm bg-white rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 border border-slate-400 flex mx-auto my-8 hover:shadow-lg"
  >
    <div class="p-5 flex col">
      <div class="flex row gap-8">
        <div>
          
          <img class="rounded-t-lg" :src="data.img_url"  />
          <span></span>
        </div>
        <div>
          
          <h5
            class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
            >
            {{ data.name }}
          </h5>
          <h5
            class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
             {{ data.role }}
          </h5>
          <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            Served as {{ data.role }} between {{ data.role_started }} and
            {{ data.role_ended }}.
            <ul class="list-style-none">
              <li>Born - {{ data.county_of_birth }}</li>
              <li>University - {{ data.undergraduate_university }}</li>
              <li>Reresented - {{ data.constituency }}</li>
            </ul>
          </p>
        </div>
    </div>
      
    </div>
  </div>
</template>
