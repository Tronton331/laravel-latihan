<template>
    <div class="container mt-5">
            <h1>Welcome , {{ authStore().user?.name || "" }}</h1>
        <div class="mt-3">

        </div>
    </div>
</template>
<script setup>
    import { ref, onMounted } from 'vue';
    import axios from 'axios';
    import { authStore } from '../stores/authstore'

    onMounted(async () =>
    {

    });

    // Ambil data
    // await axios.get('api/v1/users',
    // {
    //     headers:
    //     {
    //         accept: 'application/json',
    //         'Authorization': "Bearer 2|XrYKBKTnUPdQVQeXFXxMDbi9pTdZKoVtf6FsOgxl35d023a3"
    //     },
    // });


</script>
