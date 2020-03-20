<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>{{ post.title }}</h2>
                </div>
                <div class="card-body">
                    <template v-if="post.img">
                        <div class="card-img" :style="{backgroundImage:'url(' + post.img + ')' }"></div>
                    </template>
                    <div
                        v-else
                        class="card-img"
                        style='background:url("../../img/default.jpeg");'
                    ></div>
                    <div class="cart-descr">Описание: {{ post.descr }}</div>
                    <div class="card-author">Автор: {{ post.name }}</div>
                    <div class="card-date">Пост создан: {{ post.created_at }}</div>
                    <div class="card-btn">
                        <router-link class="btn btn-outline-primary" :to="{ name: 'home' }">На Главная</router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
  data () {
    return {
      title: null
    }
  },
  computed: {
    post () {
      return this.$store.getters.getPost
    }
  },
  mounted () {
    const id = this.$route.params.id
    this.getPost(id)
  },
  methods: {
    getPost (id) {
      this.$store.dispatch('post', id)
    }
  }
}
</script>
<style lang="scss">
    .card {
        &-btn {
            display: flex;

            a {
                margin-right: 10px;
            }
        }

        &-descr {
            margin-bottom: 10px;
        }

        &-img__max {
            height: 500px;
        }
    }
</style>
