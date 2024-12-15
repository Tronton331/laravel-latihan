<template>
    <div class="container">
        <h1>Home page</h1>
        <div v-if="useAuth.user">
            <h3>{{ userAuth.user.name }}</h3>
            <h3>{{ userAuth.user.email }}</h3>
        </div>
        <div v-else>
            <h3>No Data</h3>
        </div>
    </div>
</template>
<script setup>
    import { ref, onMounted } from 'vue';
    import axios from 'axios';
    import { authStore } from '../stores/authstore'

    const useAuth = authStore();

    const user = ref();

    onMounted(async () =>
    {
        // const data = await axios.get('/api/user');
        // user.value = data.data;
        useAuth.getUser();
    });
</script>
