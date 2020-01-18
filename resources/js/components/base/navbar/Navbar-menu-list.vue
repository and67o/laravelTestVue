<template>
    <div class="container collapse navbar-collapse">
        <ul  class="col-6 navbar-nav mr-auto">
            <li class="nav-item active">
                <router-link class="nav-link" :to="{ name: 'home' }">Главная</router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link" to="/post/create">Создать пост</router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'login' }">Войти</router-link>
            </li>
        </ul>
    </div>
</template>
