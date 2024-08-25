<template>
<div class="form-container">
    <h1>表單註冊</h1>
    <form>
    <div class="form-group">
        <label for="name">姓名:</label>
        <input type="text" v-model="name" id="name" placeholder="請輸入名字" />
        <span v-if="nameError" class="error">請輸入有效的名字</span>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input :type="password" v-model="email" id="name" placeholder="請輸入Email" />
        <span v-if="emailError" class="error">請輸入有效的電子郵件</span>
    </div>

    <div class="form-group">
        <label for="password">密碼</label>
        <div class="password-container">
            <input :type="passwordFieldType" v-model="password" id="password" placeholder="請輸入密碼" />
            <button type="button" @click="togglePasswordVisibility">{{ passwordToggleText }}</button>
        </div>
        <span v-if="passwordError" class="error">請輸入至少 8 個字符的密碼</span>
        <div class="strength-bar" :style="{backgroundColor: strengthColor, width:  strengthWidth}"></div>
        <p>{{ strengMessage }}</p>
    </div>

    <div class="form-group">
        <button type="button" @click="submitForm">送出</button>
    </div>
    </form>

    <div v-if="submissionSuccess" class="success">
        <p>表單提交成功！</p>
    </div>
    <div v-else-if="submissionFailed" class="failure">
        <p>表單提交失敗，請檢查輸入內容。</p>
    </div>
</div>
</template>
    
<script setup>
import { ref, watch, computed } from 'vue';
const name = ref('');
const email = ref('');
const password = ref('');

//提交成功錯誤提示
const submissionSuccess = ref(false);
const submissionFailed = ref(false);

// 簡單的電子郵件驗證函數
const validateEmail = (email) => {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
};

//密碼強度相關變數
const strengMessage = ref('');
const strengthColor = ref('transparent');
const strengthWidth = ref('0%');


//密碼強度檢測
watch(password,(newPassword)=>{
    let strength = 0
    if(newPassword.length >= 8){
    strength++
    }
    if(/[A-Z]/.test(newPassword)){
    strength++
    }
    if(/[0-9]/.test(newPassword)){
    strength++
    }
    if(/[^A-Za-z0-9]/.test(newPassword)){
    strength++
    }

    if(strength <=1){
    strengMessage.value = '弱'
    strengthColor.value = 'red'
    strengthWidth.value = '33%'
    }
    else if(strength === 2 || strength === 3){
    strengMessage.value = '中'
    strengthColor.value = 'orange'
    strengthWidth.value = '66%'

    }
    else if(strength === 4){
    strengMessage.value = '強'
    strengthColor.value = 'green'
    strengthWidth.value = '100%'
    }
    else{
    strengMessage.value = '';
    strengthColor.value = 'transparent';
    strengthWidth.value = '0%';
    }

    
})

// 錯誤狀態
const nameError = ref(false);
const emailError = ref(false);
const passwordError = ref(false);

// 密碼可見性切換
const isPasswordVisible = ref(false);
const passwordFieldType = computed(() => (isPasswordVisible.value ? 'text' : 'password'));
const passwordToggleText = computed(() => (isPasswordVisible.value ? '隱藏密碼' : '顯示密碼'));

const togglePasswordVisibility = () => {
    isPasswordVisible.value = !isPasswordVisible.value;
};


const submitForm = () =>{
    // 重置錯誤狀態
    nameError.value = false;
    emailError.value = false;
    passwordError.value = false;
    submissionSuccess.value = false;
    submissionFailed.value = false;

    // 驗證輸入
    if (!name.value.trim()) {
    nameError.value = true;
    }

    if (!email.value.trim() || !validateEmail(email.value)) {
    emailError.value = true;
    }

    if (password.value.length < 8) {
    passwordError.value = true;
    }

    // 如果沒有錯誤，提交成功，否則提交失敗
    if (!nameError.value && !emailError.value && !passwordError.value) {
    submissionSuccess.value = true;
    } else {
    submissionFailed.value = true;
    }
}

</script>


<style scoped>

.form-contaniner {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 6px;
    box-shadow: 0 3px 10px rgba( 0, 0, 0, 0.1);
}

h1 {
    text-align: center;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin: 5px;
    font-weight: bold;
}

input {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button { 
    width: 100%;
    padding: 10px;
    background-color: aquamarine;
    color: black;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: bisque;
}

.error {
    color: red;
    font-size: 0.9em;
}

.success {
    margin-top: 20px;
    color: green;
    font-weight: bold;
}

.failure {
    margin-top: 20px;
    color: red;
    font-weight: bold;
}

.password-container {
    display: flex;
    align-items: center;
}

.password-container input {
    flex: 1 1 auto;
}

.password-container button {
    background: none;
    border: none;
    cursor: pointer;
    color: blue;
    font-size: 0.9rem;
}

.strength-bar {
    height: 5px;
    margin-top: 8px;
    background-color: transparent;
    transition: all .3s ease;
}

p {
    margin: 5px 0 0;
    font-weight: bold;
}
</style>
