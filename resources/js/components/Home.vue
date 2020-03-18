<template>
    <div class="content">

        <section v-if="errors">
            <p>Have Errors</p>
        </section>

        <div class="row" v-else-if="posts.data">
            <PostCard
                v-for="post in posts.data"
                :post="post"
                :key="post.post_id"
            />
        </div>
        <div v-else>
            <span>
                No posts
            </span>
        </div>

        <Pagination
            :data="posts"
            @pagination-change-page="getPosts"
        />

    </div>
</template>
<script>
import PostCard from './base/post/'
import Pagination from 'laravel-vue-pagination'

export default {
  components: {
    PostCard,
    Pagination
  },
  data () {
    return {
      errors: false,
      loading: true
    }
  },
  computed: {
    posts () {
      return this.$store.getters.getAllPosts
    }
  },
  mounted () {
    if (this.posts.length) {
      return {}
    }
    this.getPosts()
  },
  methods: {
    getPosts (page = 1) {
      if (typeof page === 'undefined') {
        page = 1
      }
      this.$store.dispatch('posts', { page })
    }
  }
}
</script>
