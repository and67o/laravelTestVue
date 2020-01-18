<template>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'register' }">Зарегистрироваться</router-link>
        </li>
        <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'logout' }">Выйти</router-link>
        </li>
    </ul>
</template>
