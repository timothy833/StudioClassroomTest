<template>
<div>
  <input type="text" v-model="name" placeholder="請輸入名字"/>
  <p>{{ name }}</p>  
</div>
</template>
<script setup>
import { ref } from 'vue';

const name = ref('');
</script>
  
<style>

</style>
