<script setup>
import { ref } from 'vue';

const isOpen = ref(false);

const toggleDropdown = () => {
  isOpen.value = !isOpen.value;
};

const closeDropdown = () => {
  isOpen.value = false;
};
</script>

<template>
  <div class="bg-white">
    <button
      id="dropdownRadioButton"
      data-dropdown-toggle="dropdownRadio"
      @click="toggleDropdown"
      class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5"
      type="button"
    >
      Filters
    </button>
    <div v-if="isOpen" ref="dropdownMenu" class="absolute mt-2">
      <div
        class="bg-white border border-gray-300 shadow-md rounded-md py-1.5 modal-content overflow-visible p-2"
        :style="menuPosition"
      >
        <div class="flex row">
          <div class="mb-4 mr-4">
            <div>
              <h3 class="font-bold">Era</h3>
              <div class="flex items-center mb-4">
                <input
                  id="default-checkbox"
                  type="checkbox"
                  value=""
                  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                />
                <label
                  for="default-checkbox"
                  class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                  >Default checkbox</label
                >
              </div>
              <div class="flex items-center">
                <input
                  checked
                  id="checked-checkbox"
                  type="checkbox"
                  value=""
                  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                />
                <label
                  for="checked-checkbox"
                  class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                  >Checked state</label
                >
              </div>
            </div>
          </div>
          <div>
            <div>
              <h3 class="font-bold">Position</h3>
              <div class="flex items-center mb-4">
                <input
                  id="default-checkbox"
                  type="checkbox"
                  value=""
                  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                />
                <label
                  for="default-checkbox"
                  class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                  >Prime Minister</label
                >
              </div>
              <div class="flex items-center mb-4">
                <input
                  id="default-checkbox"
                  type="checkbox"
                  value=""
                  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                />
                <label
                  for="default-checkbox"
                  class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                  >Chancellor</label
                >
              </div>
              <div class="flex items-center">
                <input
                  checked
                  id="checked-checkbox"
                  type="checkbox"
                  value=""
                  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                />
                <label
                  for="checked-checkbox"
                  class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                  >Foreign Secretary</label
                >
              </div>
            </div>
          </div>
        </div>
        <div class="flex justify-center gap-2 mt-6">
          <button
            @click="closeDropdown"
            class="p-2 rounded bg-red-500 hover:bg-red-600 text-white"
          >
            Close
          </button>
          <button
            @click=""
            class="p-2 rounded bg-green-500 hover:bg-green-600 text-white"
          >
            Apply
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
