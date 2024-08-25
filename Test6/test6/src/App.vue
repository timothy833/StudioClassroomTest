<template>
<div>
    <h1>ERP Key:</h1>
    <p v-if="erpkey">{{ erpkey }}</p>
    <p v-else>Error</p>
</div>
</template>

<script setup>
import { ref, onMounted} from 'vue';
import axios from 'axios';

//存erpkey
const erpkey = ref('');

//組件一開始掛載就去後端抓資料
onMounted(()=>{
  axios.get('http://localhost/php_json.php')
    .then(response =>{
      //提取並設置erpkey的值
      erpkey.value = response.data.DATA.erpkey;
    })
    .catch(error => {
      console.error("出現錯誤:",error);
    })
});
</script>



<style scoped>

</style>
