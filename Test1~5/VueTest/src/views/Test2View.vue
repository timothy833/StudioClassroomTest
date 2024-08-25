<template>
  <div>
    <h1>計數器: {{ counter }}</h1>
    <button type="button" @click="increaseCounter">增加</button>
    <button type="button" @click="decreaseCounter">減少</button>
  </div>

</template>

<script setup>
import { computed } from 'vue';
import { useStore } from 'vuex'; 

const store = useStore();

const counter = computed(()=> store.state.counter);

const increaseCounter = ()=> {
  store.commit('increase');
};

const decreaseCounter = ()=> {
  store.commit('decrease');
};

</script>