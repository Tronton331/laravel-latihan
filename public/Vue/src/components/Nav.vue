<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <router-link class="nav-link active" aria-current="page" to="/">Home</router-link>
                </li>
                <li class="nav-item" v-if="!useAuth.user">
                    <router-link class="nav-link" to="Login">Login</router-link>
                </li>
                <li class="nav-item" v-if="!useAuth.user">
                    <router-link class="nav-link" to="Register" tabindex="-1" aria-disabled="true">Register</router-link>
                </li>
                <li class="nav-item" v-if="useAuth.user">
                    <router-link class="nav-link" to="/login" tabindex="-1" aria-disabled="true">
                        <span @click="$event => logout()">Logout</span>
                    </router-link>
                </li>
            </ul>
        </div>
    </div>
</nav>
</template>

<script setup>
    import { authStore } from '../stores/authstore'
    import cookie from '../utils/Cookie'

    const useAuth = authStore();
    // const deleteCookie = () =>
    // {
    //     cookie.deleteCookie('laravel_session');
    //     cookie.deleteCookie('user');
    // }
    const logout = () =>
    {
        // cookie.getCookie('XSRF-TOKEN');
        useAuth.logout();
        // deleteCookie();
    }
</script>
