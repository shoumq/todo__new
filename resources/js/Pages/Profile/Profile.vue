<script setup>
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Profile" />

    <header>
        <div class="container flex-header">
            <Link href="/profile" class="title">{{ user.name }}</Link>
            <div class="btn btn-danger login-btn" @click="logout">Выйти</div>
        </div>
    </header>
</template>

<script>
export default {
    name: "Profile",
    props: ['user']
}
</script>

<style scoped>

</style>
