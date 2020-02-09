<template>
    <ul class="navbar-nav ml-auto">
        <li v-if="!isAuth" class="nav-item">
            <router-link class="nav-link" :to="{ name: 'register' }">Зарегистрироваться</router-link>
        </li>
        <li v-if="!isAuth" class="nav-item">
            <router-link class="nav-link" :to="{ name: 'login' }">Войти</router-link>
        </li>
        <li v-if="isAuth" class="nav-item">
            <span class="nav-item" @click="logout()">Выйти</span>
        </li>
    </ul>
</template>
<script>
import {
  mapGetters
} from 'vuex'

export default {
  data: function () {
    return {}
  },
  computed: {
    ...mapGetters({
      isAuth: 'isAuth'
    })
  },
  mounted () {
  },
  methods: {
    logout () {
      this.$store.dispatch('logout')
    }
  }
}
</script>
