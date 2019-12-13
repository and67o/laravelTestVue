<template>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <router-link class="nav-link" :to="{ name: 'home' }">Главная</router-link>
        </li>
        <li class="nav-item">
            <router-link class="nav-link" to="/post/create">Создать пост</router-link>
        </li>
        <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'login' }">Войти</router-link>
        </li>
        <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'register' }">Зарегистрироваться</router-link>
        </li>
        <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'logout' }">Выйти</router-link>
        </li>
    </ul>
</template>
