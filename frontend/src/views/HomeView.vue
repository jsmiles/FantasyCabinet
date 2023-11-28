<script setup>
import CardTemplate from '../components/CardTemplate.vue';
import MainTable from '../components/MainTable.vue';
</script>

<template>
  <div class="flex justify-center gap-4 my-8">
    <CardTemplate />
    <CardTemplate />
    <CardTemplate />
  </div>
  <div>
    <MainTable class="max-w-7xl mx-auto" />
  </div>
</template>
