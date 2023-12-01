<script setup>
import CardTemplate from '../components/CardTemplate.vue';
import MainTable from '../components/MainTable.vue';
import { ref, computed } from 'vue';

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
</script>

<template>
  <div class="flex justify-center gap-4 my-8">
    <div v-if="areAllNulls">placeholder</div>
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
            class="bg-green-500 hover:bg-green-600 text-white p-2 rounded h-12"
          >
            Submit
          </button>
        </div>
      </div>
    </div>
  </div>
  <div>
    <MainTable class="max-w-7xl mx-auto" @select="handleSelect" />
  </div>
</template>
