<template>
  <div>
    <h2>User Table</h2>
    <button @click="fetchUsers">Fetch</button>
    <button @click="parseUsers" :disabled="users.length === 0">Parse</button>

    <!-- 顯示選中的使用者資訊 -->
    <div v-if="selectedUser">
      <h3>User Info</h3>
      <ul>
        <li><strong>ID:</strong> {{ selectedUser.id }}</li>
        <li><strong>Username:</strong> {{ selectedUser.username }}</li>
        <li><strong>Name:</strong> {{ selectedUser.name }}</li>
        <li>
          <strong>Email:</strong>
          <a :href="'mailto:' + selectedUser.email" target="_blank">{{ selectedUser.email }}</a>
        </li>
        <li>
          <strong>Phone:</strong>
          <span :style="{ color: selectedUser.phone.startsWith('1') ? 'red' : 'black' }">
            {{ selectedUser.phone }}
          </span>
        </li>
        <li><strong>Address:</strong> {{ selectedUser.address.street }}, {{ selectedUser.address.city }}</li>
        <li><strong>Website:</strong> <a :href="'http://' + selectedUser.website" target="_blank">{{ selectedUser.website }}</a></li>
        <li><strong>Company:</strong> {{ selectedUser.company.name }}</li>
      </ul>
    </div>

    <!-- 表格列表 -->
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Username</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Address</th>
          <th>Website</th>
          <th>Company</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in users" :key="user.id">
          <td>{{ user.id }}</td>
          <td>{{ user.username }}</td>
          <td>{{ user.name }}</td>
          <td><a :href="'mailto:' + user.email" target="_blank">{{ user.email }}</a></td>
          <td>{{ user.phone }}</td>
          <td>{{ user.address.street }}, {{ user.address.city }}</td>
          <td><a :href="'http://' + user.website" target="_blank">{{ user.website }}</a></td>
          <td>{{ user.company.name }}</td>
          <td>
            <!-- 顯示詳細資訊的按鈕 -->
            <button @click="showDetails(user)">Detail</button>
            <!-- 刪除該使用者的按鈕 -->
            <button @click="deleteUser(user.id)">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      users: [], // 使用者列表
      selectedUser: null // 選中的使用者
    };
  },
  methods: {
    // 從 API 獲取使用者資料並排序
    fetchUsers() {
      axios.get('https://jsonplaceholder.typicode.com/users')  
        .then(response => {
          // 以 ID 進行降序排序
          this.users = response.data.sort((a, b) => b.id - a.id);
        })
        .catch(err => {
          console.error("Fetch users error:", err);
        });
    },
    // 呼叫 API 將使用者的 `username` 轉換為小寫
    parseUsers() {
      axios.post('http://localhost:8000/api/parse-users', { users: this.users })  // 呼叫 Laravel API
        .then(response => {
          // 更新處理後的使用者資料（此處只更新 `username`）
          this.users = response.data;
        })
        .catch(err => {
          console.error("Parse users error:", err);
        });
    },
    // 顯示詳細資訊
    showDetails(user) {
      this.selectedUser = user;
    },
    // 刪除使用者
    deleteUser(userId) {
      // 將使用者從列表中移除
      this.users = this.users.filter(user => user.id !== userId);
    }
  }
};
</script>

