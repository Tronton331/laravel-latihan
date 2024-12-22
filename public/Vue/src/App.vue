<script setup>
    import Nav from "./components/Nav.vue"
    import { onMounted } from "vue";

    onMounted(() => {
        document.documentElement.setAttribute("data-bs-theme", "dark");
    });
</script>

<template>
    <div>
        <Nav />
        <RouterView></RouterView>
    </div>
</template>

<style scoped>

</style>
