<script setup>
import CardTemplate from '../components/CardTemplate.vue';
import MainTable from '../components/MainTable.vue';
import { ref, computed } from 'vue';
import apiClient from '../services/api';

const errorText = ref(null);
const selectedData = ref({
  prime_minister: null,
  chancellor: null,
  foreign_secretary: null,
});

const handleSelect = ({ role, data }) => {
  selectedData.value[role] = data;
};

const areAllNulls = computed(() => {
  return Object.values(selectedData.value).every((value) => value === null);
});

const isDropdownVisible = computed(() => {
  return Object.values(selectedData.value).every((value) => value !== null);
});

const handleSubmit = () => {
  const primeMinister = String(selectedData.value.prime_minister.id);
  const chancellor = String(selectedData.value.chancellor.id);
  const foreignSecretary = String(selectedData.value.foreign_secretary.id);

  console.log('After conversion:', primeMinister, chancellor, foreignSecretary);

  apiClient
    .post('/submit', {
      prime_minister: primeMinister,
      chancellor: chancellor,
      foreign_secretary: foreignSecretary,
      motivation: 'motivation placeholder',
    })
    .then((response) => {
      console.log(response.data.message);
      errorText.value = null;
    })
    .catch((error) => {
      console.error(error.response.data);
      errorText.value = error.response.data.message;
    });
};
</script>

<template>
  <div class="flex justify-center gap-4 my-8">
    <div v-if="areAllNulls" class="flex flex-col items-center max-w-xl">
      <h2 class="text-4xl">Welcome to Fantasy Cabinet</h2>
      <p class="text-xl my-8">
        This site allows you to form your ideal government from any combination
        of former office holders. Select from the table below who you think
        would be best suited to the top jobs of Foreign Secretary, Chancellor of
        the Exchequer and Prime Minister. You can also learn more about each
        person or read the about section to learn more about this site.
      </p>
    </div>
    <div v-else class="flex flex-col justify-center gap-4 my-8">
      <div class="flex row justify-center gap-4 my-8">
        <CardTemplate
          :role="'Prime Minister'"
          :selectedData="selectedData.prime_minister"
        />
        <CardTemplate
          :role="'Chancellor'"
          :selectedData="selectedData.chancellor"
        />
        <CardTemplate
          :role="'Foreign Secretary'"
          :selectedData="selectedData.foreign_secretary"
        />
        <div>
          <button
            v-if="isDropdownVisible"
            @click="handleSubmit"
            class="bg-green-500 hover:bg-green-600 text-white p-2 rounded h-12 pt-1/2"
          >
            Submit
          </button>
          <p v-if="errorText" class="text-red-500 text-xs">{{ errorText }}</p>
        </div>
      </div>
    </div>
  </div>
  <div>
    <MainTable class="max-w-7xl mx-auto" @select="handleSelect" />
  </div>
</template>
