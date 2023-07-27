<script setup>
import {Head, Link} from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard"/>

    <header>
        <div class="container flex-header">
            <Link href="/profile" class="title">{{ user.name }}</Link>

            <div class="header-img__wrapper">
                <div class="btn btn-danger login-btn" @click="logout">Выйти</div>
                <div class="header-img">
                    <a href="/">
                        <img src="images/i1.png" alt="">
                    </a>
                    <a href="/">
                        <img src="images/i2.png" alt="">
                    </a>
                    <a href="/">
                        <img src="images/i3.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main class="container">
        <div class="main-header">
            <div class="title">Список дел ({{ list.length }})</div>
        </div>

        <div class="main-main">
            <form class="add-item" @submit.prevent="addItem">
                <input type="text" placeholder="Название" v-model="titleItem">
                <button class="btn btn-purple">Добавить</button>
            </form>

            <div class="list">
                <div class="list-item">
                    <div class="list-item__flex-jus" v-for="item in list">
                        <div class="list-item__flex">
                            <input type="checkbox" :checked="item.status === '1'" value="1"
                                   @change="changeStatus(item.id)">
                            <div class="title" v-if="!item.edit">{{ item.title }}</div>
                            <form @submit.prevent="closeEdit(item.id)">
                                <input type="text" v-model="item.title" v-if="item.edit">
                            </form>
                        </div>

                        <div class="list-item__flex">
                            <img src="images/i5.png" alt="" @click="addEditItem(item.id)" style="cursor: pointer">
                            <img src="images/i4.png" alt="" @click="delItem(item.id)" style="cursor: pointer">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>


<script>

export default {
    data() {
        return {
            titleItem: ''
        }
    },

    props: ['user', 'list', 'url'],

    methods: {
        logout() {
            axios.post('/logout')
            window.location.href = '/login'
        },

        delItem(item_id) {
            axios.post('/del_item', {item_id})
                .then(() => {
                    this.list.splice(this.list.findIndex(x => x.id === item_id), 1)
                })
        },

        addItem() {
            axios.post('/add_item', {titleItem: this.titleItem})
                .then((response) => {
                    this.list.unshift(response.data)

                    for (let i = 0; i < this.list.length; i++) {
                        this.list[i].edit = false;
                    }

                    this.titleItem = ''
                })
        },

        addEditItem(item_id) {
            for (let i = 0; i < this.list.length; i++) {
                this.list[i].edit = false;
            }

            this.list.find(x => x.id === item_id).edit = 1
        },

        closeEdit(item_id) {
            axios.post('/save_item', {item_id, title: this.list.find(x => x.id === item_id).title})

            for (let i = 0; i < this.list.length; i++) {
                this.list[i].edit = false;
            }
        },

        changeStatus(item_id) {
            if (this.list.find(x => x.id === item_id).status === '1') {
                this.list.find(x => x.id === item_id).status = '0'
            } else {
                this.list.find(x => x.id === item_id).status = '1'
            }

            axios.post('/status_item', {status: this.list.find(x => x.id === item_id).status, item_id})
                .then((response) => {
                    console.log(response);
                })
        }
    },

    mounted() {
        for (let i = 0; i < this.list.length; i++) {
            this.list[i].edit = false;
        }
    }
}
</script>


<style lang="sass" scoped>
.login-btn
    width: 100rem
</style>
