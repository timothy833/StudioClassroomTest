<template>
<div>
    <h1>輸入一個數字計算平方和</h1>
    <input type="text" v-model="inputNumber" placeholder="請輸入數字"/>
    <p>{{ squaredNumber }}</p>  
</div>
</template>
<script setup>
import { ref, watch, computed } from 'vue';

const inputNumber = ref('');
const squaredNumber = computed(()=>{
    return inputNumber.value*inputNumber.value;
});

watch(squaredNumber, (newValue, oldValue)=>{
    console.log("新的值:"+ newValue + "舊的值" +oldValue);
});
</script>
    