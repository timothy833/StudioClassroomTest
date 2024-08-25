<template>
<button type="button" @click="toggleParagraph">切換段落</button>
<p v-if="showParagraph"> 這是顯示的段落 </p>

<ul>
<li v-for=" name in names" :key="name">{{ name }}</li>
</ul>

</template>

<script setup>
import { ref } from 'vue';
const showParagraph = ref(true);
const toggleParagraph = () => {
  showParagraph.value = !showParagraph.value;
};

const names = ['Peter', 'Timothy', 'David'];

</script>
