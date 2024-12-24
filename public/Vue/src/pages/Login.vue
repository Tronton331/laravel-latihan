<template>
    <div class="container mt-5">
        <div class="col-md-6 m-auto">
            <h1>Login page</h1>
            <div class="mt-3" style="color: red;">
                {{ errorMessage }}
            </div>
            <div class="mt-3">
                <form @submit.prevent="submitLogin">
                    <div class="mb-3">
                        <label for="EmailLoginFormInput" class="form-label">Email</label>
                        <input type="email" class="form-control" id="EmailLoginFormInput" v-model="form.email" autocomplete="email" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="PasswordLoginFormInput" class="form-label">Password</label>
                        <input type="password" class="form-control" id="PasswordLoginFormInput" v-model="form.password" autocomplete="current-password">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
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

    const form =  ref(
    {
        email: '',
        password: ''
    });

    const errorMessage = ref();

    const submitLogin = () =>
    {
        authStore().login(form.value.email, form.value.password).then(res => {
            router.push("/")
        }, error => {
            alert("Login Error")
        })

    }
</script>
