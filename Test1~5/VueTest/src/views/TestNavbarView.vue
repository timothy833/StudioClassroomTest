<template>
<nav>
    <ul>
        <li><router-link to="/Test1">Test1</router-link></li>
        <li><router-link to="/Test2">Test2</router-link></li>
        <li><router-link to="/Test3">Test3</router-link></li>
        <li><router-link to="/Test4">Test4</router-link></li>
        <li><router-link to="/Test5">Test5</router-link></li>
    </ul>
</nav>
<router-view />
</template>


<style scoped>

html, body {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

nav {
  margin: 0;
  padding: 0;
}


ul {
    width: 100%;
    list-style: none;
    margin-bottom: 10px;
    display: flex;
    gap: 20px; 
}

li {
  margin: 0; 
}

</style>