<template>
    <div class="container">
        <div class="col-md-6 m-auto">
            <h1>Login page</h1>
            <div class="mt-3">
                <form @submit.prevent="submitLogin">
                    <div class="mb-3">
                        <label for="EmailLoginFormInput" class="form-label">Email</label>
                        <input type="email" class="form-control" id="EmailLoginFormInput" v-model="form.email" autocomplete="username" placeholder="name@example.com">
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

    const router = useRouter();
    const useAuth = authStore();

    const form =  ref(
    {
        email: '',
        password: ''
    });

    const getToken = async () =>
    {
        await axios.get('/sanctum/csrf-cookie');
    }

    const submitLogin = async () =>
    {
        // await getToken();
        await useAuth.getToken();
        //! Error 419
        await axios.post('/login',
        {
            email: form.value.email,
            password: form.value.password
        },
        // {
        //     headers: {
        //         accept: 'application/json',
        //         'X-XSRF-TOKEN': getCookie('XSRF-TOKEN')
        //     },
        //     withCredentials: true
        // }
        );

        router.push('/');
    }

    // function getCookie(name)
    // {
    //     const Decoded = decodeURIComponent(document.cookie);
    //     const Array = Decoded.split("; ");
    //     let result = null;

    //     Array.forEach(element =>
    //     {
    //         if (element.indexOf(name) == 0)
    //         {
    //             result = element.substring(name.length + 1);
    //         }
    //     });
    //     return result;
    // }
</script>
