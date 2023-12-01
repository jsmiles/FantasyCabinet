<template>
  <h1 class="text-4xl text-bold text-center mx-auto my-8">About Page</h1>
  <p class="text-2xl text-center mx-auto mb-16">Welcome to Fantasy Cabinet.</p>

  <div
    id="accordion-collapse"
    data-accordion="collapse"
    class="max-w-xl mx-auto border border-slate-400 rounded bg-white p-2"
  >
    <div v-for="item in accordionItems" :key="item.id">
      <h2 :id="`accordion-collapse-heading-${item.id}`">
        <button
          type="button"
          class="flex items-center justify-between w-full p-5 mb-1 font-medium rtl:text-right border border-slate-200 rounded text-gray-500 focus:ring-4 focus:ring-blue-200 hover:bg-blue-100"
          :data-accordion-target="`#accordion-collapse-body-${item.id}`"
          :aria-expanded="item.open ? 'true' : 'false'"
          :aria-controls="`accordion-collapse-body-${item.id}`"
          @click="toggleAccordion(item.id)"
        >
          <span>{{ item.question }}</span>
          <svg
            data-accordion-icon
            class="w-3 h-3 rotate-180 shrink-0"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 10 6"
          >
            <path
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M9 5 5 1 1 5"
            />
          </svg>
        </button>
      </h2>
      <div
        :id="`accordion-collapse-body-${item.id}`"
        :class="{ hidden: !item.open }"
        :aria-labelledby="`accordion-collapse-heading-${item.id}`"
      >
        <div class="p-5 border border-b-0 border-slate-200">
          <p class="mb-2 text-gray-500">{{ item.answer }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
const accordionItems = ref([
  {
    id: 1,
    question: 'What is Fantasy Cabinet?',
    answer:
      "Fantasy Cabinet is an interactive web experience that allows users to select a Prime Minister, Chancellor, and Foreign Secretary from UK history to form their ideal government. It aims to engage users in an exploration of British history and leadership while fostering an appreciation for the individuals who shaped the nation's past",
    open: false,
  },
  {
    id: 2,
    question: 'How was it built?',
    answer:
      'Fantasy Cabinet was built with several popular web development tools including Vue, a Javascript Framework to build the user interface. The API is built using Laravel, a PHP framework that controls the flow of data from the MySQL database. For more information and to view the source code please visit the Github repository.',
    open: false,
  },
  {
    id: 3,
    question: 'Why was it built?',
    answer:
      'This is a technical portfolio site that is designed to illustrate many of the most important features in both frontend and backend development.',
    open: false,
  },
]);

const toggleAccordion = (id) => {
  accordionItems.value.forEach((item) => {
    item.open = item.id === id ? !item.open : false;
  });
};
</script>
