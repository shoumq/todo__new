<script setup>
import {Head, Link} from '@inertiajs/vue3';
</script>

<template>
    <Head title="Profile"/>

    <header>
        <div class="container flex-header">
            <Link href="/profile" class="title">{{ user.name }}</Link>

            <div class="header-img__wrapper">
                <div class="btn btn-danger login-btn" @click="logout">Выйти</div>
                <div class="header-img">
                    <a href="/">
                        <img src="/storage/i1.png" alt="">
                    </a>
                    <a href="/">
                        <img src="/storage/i2.png" alt="">
                    </a>
                    <a href="/">
                        <img src="/storage/i3.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </header>

    <div class="profile__wrapper">
        <div class="main-header profile__main-header">
            <div class="title">Мой аккаунт</div>
            <div class="profile__title"></div>
        </div>

        <div class="main-main profile__main-main">
            <div class="profile__main-main__flex">
                <div class="profile__main-main__item">Личные данные</div>
                <div class="profile__main-main__item">Услуги</div>
                <div class="profile__main-main__item">Новости</div>
            </div>

            <div>
                <div class="logo"></div>
                <button class="btn btn-primary">Изменить профиль</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Profile",
    props: ['user']
}
</script>

<style lang="sass" scoped>
.login-btn
    width: 100rem

.btn
    box-shadow: none !important
    font-weight: 200
</style>
