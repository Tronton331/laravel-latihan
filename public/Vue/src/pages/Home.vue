<template>
    <div class="container mt-5">
        <div v-if="userAuth.user">
            <h1>Welcome , {{ userAuth.user.name }}</h1>
        </div>
        <div v-else>
            <h3>Annonymous</h3>
        </div>
        <div class="mt-3">
            
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
