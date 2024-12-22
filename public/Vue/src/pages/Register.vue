<template>
    <div class="container mt-5">
        <div class="col-md-6 m-auto">
            <h1>Register page</h1>
            <div class="mt-3" style="color: red;">
                    {{ errorMessage }}
            </div>
            <div class="mt-3">
                <form @submit.prevent="submitRegister" class="row g-3">
                    <div class="col-12">
                        <label for="NameRegisterFormInput" class="form-label">Username</label>
                        <input type="text" class="form-control" id="NameRegisterFormInput" v-model="form.name" autocomplete="username">
                    </div>
                    <div class="col-12">
                        <label for="EmailRegisterFormInput" class="form-label">Email</label>
                        <input type="email" class="form-control" id="EmailRegisterFormInput" v-model="form.email" autocomplete="email">
                    </div>
                    <div class="col-12">
                        <label for="PasswordRegisterFormInput" class="form-label">Password</label>
                        <input type="password" class="form-control" id="PasswordRegisterFormInput" v-model="form.password" autocomplete="current-password">
                    </div>
                    <div class="col-12">
                        <label for="PasswordRegisterFormInput" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="PasswordRegisterFormInput" v-model="form.password_confirmation" autocomplete="off">
                    </div>
                    <div class="col-md-5">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'
    import axios from 'axios'
    import { useRouter } from 'vue-router'
    import { authStore } from '../stores/authstore'
    import cookie from '../utils/Cookie'

    const router = useRouter();
    const useAuth = authStore();

    const form =  ref(
    {
        name:'',
        email: '',
        password: '',
        password_confirmation: ''
    });

    const errorMessage = ref();

    const submitRegister = async () =>
    {
        await useAuth.getToken();
        await axios.post('/register',
        {
            name: form.value.name,
            email: form.value.email,
            password: form.value.password,
            password_confirmation: form.value.password_confirmation
        },
        {
            headers:
            {
                accept: 'application/json',
                'X-XSRF-TOKEN': cookie.getCookie('XSRF-TOKEN')
            },
        }).then(response =>
        {
            if (response.status === 204)
            {
                router.push('/');
            }
            errorMessage.value = response.data.message;
            console.log("[Login] Success");
        }).catch(error =>
        {
            errorMessage.value = error.response.data.message;
            console.error("[Login] Error: ", error.response.data.message);
        });
    }
</script>
