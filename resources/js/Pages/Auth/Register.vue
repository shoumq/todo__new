<script setup>
import {Head, useForm} from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: true,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Регистрация"/>

    <header>
        <div class="container flex-header">
            <Link href="/profile" class="title">Лого</Link>

            <div class="header-img__wrapper">
                <div class="header-img">
                    <a href="/">
                        <img src="../images/i1.png" alt="">
                    </a>
                    <a href="/">
                        <img src="../images/i2.png" alt="">
                    </a>
                    <a href="/">
                        <img src="../images/i3.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </header>

    <div class="container auto">
        <div class="fs2">
            Регистрация
        </div>

        <form @submit.prevent="submit">
            <div>
                <input id="name"
                       type="text"
                       v-model="form.name"
                       required
                       autofocus
                       autocomplete="name" placeholder="Имя">

                <div class="err">{{ form.errors.name }}</div>
            </div>

            <div class="mt-4">
                <input id="email"
                       type="email"
                       class="mt-1 block w-full"
                       v-model="form.email"
                       required
                       autocomplete="username" placeholder="Email">

                <div class="err">{{ form.errors.email }}</div>
            </div>

            <div class="mt-4">
                <input id="password"
                       type="password"
                       v-model="form.password"
                       required
                       autocomplete="password" placeholder="Пароль">

                <div class="err">{{ form.errors.password }}</div>
            </div>

            <div class="mt-4">
                <input id="password_confirmation"
                       type="password"
                       v-model="form.password_confirmation"
                       required
                       autocomplete="new-password" placeholder="Повторите пароль">

                <div class="err">{{ form.errors.password_confirmation }}</div>
            </div>

            <div class="flex-header flex-header__mt">
                <a
                    href="/login"
                    class="fs"
                >
                    Уже есть аккаунт?
                </a>

                <button type="submit" class="btn btn-primary" :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing">
                    Зарегистрироваться
                </button>
            </div>
        </form>
    </div>
</template>

<style lang="sass" scoped>
.btn-primary
    width: 282rem !important

.flex-header__mt
    margin-top: 30rem
</style>
