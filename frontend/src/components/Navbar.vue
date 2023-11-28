<script setup>
import { RouterLink } from 'vue-router';
import { ref } from 'vue';

const isNavbarOpen = ref(false);

const toggleNavbar = () => {
  isNavbarOpen.value = !isNavbarOpen.value;
};
</script>

<template>
  <nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div
      class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4"
    >
      <div class="flex items-center space-x-3 rtl:space-x-reverse">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="w-6 h-6"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z"
          />
        </svg>

        <span
          class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"
          >Fantasy Cabinet</span
        >
      </div>
      <button
        @click="toggleNavbar"
        data-collapse-toggle="navbar-default"
        type="button"
        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
        aria-controls="navbar-default"
        aria-expanded=":isNavbarOpen"
      >
        <span class="sr-only">Open main menu</span>
        <svg
          class="w-5 h-5"
          aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 17 14"
        >
          <path
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M1 1h15M1 7h15M1 13h15"
          />
        </svg>
      </button>
      <div
        :class="isNavbarOpen ? '' : 'hidden'"
        id="navbar-default"
        class="w-full md:block md:w-auto"
      >
        <ul
          class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700"
        >
          <li>
            <RouterLink
              @click="toggleNavbar"
              to="/"
              class="block py-2 px-3 rounded md:p-0 dark:text-white"
              :class="{
                'text-blue-700': $route.path === '/',
                'hover:bg-gray-100': $route.path !== '/',
              }"
            >
              Home
            </RouterLink>
          </li>
          <li>
            <RouterLink
              @click="toggleNavbar"
              to="/about"
              class="block py-2 px-3 rounded md:p-0 dark:text-white"
              :class="{
                'text-blue-700': $route.path === '/about',
                'hover:bg-gray-100': $route.path !== '/about',
              }"
            >
              About
            </RouterLink>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>
