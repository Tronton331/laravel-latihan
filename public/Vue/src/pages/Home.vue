<template>
    <div class="container mt-5">
        <h1>Home page</h1>
        <div v-if="userAuth.user">
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

    const userAuth = authStore();

    onMounted(async () =>
    {
        await userAuth.getUser();
    });
</script>
