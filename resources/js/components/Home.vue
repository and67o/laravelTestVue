<template>
    <div class="content">

        <section v-if="errors">
            <p>We're sorry, we're not able to retrieve this information at the moment, please try back later</p>
        </section>

        <div v-else class="row">
            <PostCard
                v-for="post in posts.data"
                :post="post"
                :key="post.post_id"
            />
        </div>

        <Pagination :data="posts" @pagination-change-page="getPosts"/>

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
      posts: {},
      errors: false,
      loading: true
    }
  },
  mounted () {
    this.getPosts()
  },
  methods: {
    getPosts (page) {
      if (typeof page === 'undefined') {
        page = 1
      }
      // eslint-disable-next-line no-undef
      axios
        .get('http://127.0.0.1:8000/api/v1/posts?page=' + page)
        .then(response => {
          this.posts = response.data.posts
        })
        .catch(e => {
          console.log(e)
        })
        .finally(() => (
          this.loading = false)
        )
    }
  }
}
</script>
