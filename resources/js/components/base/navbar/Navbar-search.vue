<template>
    <form class="form-inline my-2 my-lg-0" @submit.prevent="search" action="POST">
        <input
            class="form-control mr-sm-2"
            name="search"
            type="search"
            placeholder="Найти пост"
            aria-label="Search"
            v-model="searchValue"
        >
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
            Поиск
        </button>
    </form>
</template>
<script>
export default {
  data () {
    return {
      searchValue: null
    }
  },
  mounted () {

  },
  methods: {
    search () {
      this.$store.dispatch('posts', {
        page: 1,
        search: this.searchValue
      })
    }
  }
}
</script>
