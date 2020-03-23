<template>
    <ul class="col-6 navbar-nav mr-auto">
        <li class="nav-item active">
            <router-link class="nav-link" :to="{ name: 'home' }">Главная</router-link>
        </li>
        <li v-if="isAuth" class="nav-item">
            <router-link class="nav-link" :to="{ name: 'postCreate' }">Создать пост</router-link>
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
  }
}
</script>
