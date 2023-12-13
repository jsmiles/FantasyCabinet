<template>
  <div class="">
    <label for="search-input" class="sr-only">Search</label>
    <input
      id="search-input"
      v-model="searchTerm"
      @input="emitSearch"
      placeholder="Search..."
      class="p-1 border border-gray-200 m-4 rounded focus:border-gray-300"
    />
  </div>
</template>

<script setup>
import { ref, defineProps, defineEmits } from 'vue';

const props = defineProps(['searchTerm']);
const emit = defineEmits();

const emitSearch = () => {
  emit('search', searchTerm);
};

const searchTerm = ref(props.searchTerm);
</script>
