<template>
    <ul class="navbar-nav ml-auto">
        <li v-if="!isAuth" class="nav-item">
            <router-link class="nav-link" :to="{ name: 'register' }">Register</router-link>
        </li>
        <li v-if="!isAuth" class="nav-item">
            <router-link class="nav-link" :to="{ name: 'login' }">Log in</router-link>
        </li>
        <li v-if="isAuth" class="nav-item">
            <span class="nav-item" @click="logout()">Log out</span>
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
        .catch(() => false)
    }
  }
}
</script>
