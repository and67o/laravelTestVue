<template>
    <ul class="col-6 navbar-nav mr-auto">
        <li class="nav-item active">
            <router-link class="nav-link" :to="{ name: 'home' }">Главная</router-link>
        </li>
        <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'postCreate' }">Создать пост</router-link>
        </li>
    </ul>
</template>
