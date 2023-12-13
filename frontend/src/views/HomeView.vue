<script setup>
import CardTemplate from '../components/CardTemplate.vue';
import MainTable from '../components/MainTable.vue';
import { ref, computed } from 'vue';
import apiClient from '../services/api';

const successMessage = ref(null);
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

  apiClient
    .post('/submit', {
      prime_minister: primeMinister,
      chancellor: chancellor,
      foreign_secretary: foreignSecretary,
      motivation: 'motivation placeholder',
    })
    .then((response) => {
      successMessage.value = response.data.message;
      errorText.value = null;
    })
    .catch((error) => {
      console.error(error.response.data);
      errorText.value = error.response.data.message;
    });
};

const handleClear = () => {
  selectedData.value = {
    prime_minister: null,
    chancellor: null,
    foreign_secretary: null,
  };
  successMessage.value = null;
  errorText.value = null;
};

const handleShare = () => {
  console.log('Handling the share functionality');
};
</script>

<template>
  <div class="flex justify-center gap-4 my-8">
    <div v-if="areAllNulls" class="flex flex-col items-center max-w-xl m-4">
      <h2 class="text-4xl">Welcome to Fantasy Cabinet</h2>
      <p class="text-xl my-8">
        This site allows you to form your ideal government from any combination
        of former office holders. Select from the table below who you think
        would be best suited to the top jobs of Foreign Secretary, Chancellor of
        the Exchequer and Prime Minister. You can also learn more about each
        person or read the about section to learn more about this site.
      </p>
    </div>
    <div
      v-if="!areAllNulls"
      class="flex flex-col md:flex-row justify-center gap-4 my-8"
    >
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
      <div class="flex flex-col items-center gap-4">
        <button
          v-if="isDropdownVisible && !successMessage"
          @click="handleSubmit"
          class="bg-green-500 hover:bg-green-600 text-white p-2 rounded h-12 pt-1/2"
        >
          Submit
        </button>
        <button
          v-if="successMessage"
          @click="handleClear"
          class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded h-12 pt-1/2"
        >
          Clear Selections
        </button>
        <button
          v-if="successMessage"
          @click="handleShare"
          class="bg-yellow-500 hover:bg-yellow-600 text-white p-2 rounded h-12 pt-1/2"
        >
          Share
        </button>
        <p v-if="successMessage" class="text-green-500 text-xs mt-2 mx-auto">
          {{ successMessage }}
        </p>
        <p v-if="errorText" class="text-red-500 text-xs mt-2">
          {{ errorText }}
        </p>
      </div>
    </div>
  </div>
  <div class="mx-2 rounded-xl mb-24">
    <MainTable class="max-w-7xl mx-auto" @select="handleSelect" />
  </div>
</template>
