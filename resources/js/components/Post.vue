<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>{{ post.title }}</h2>
                </div>
                <div class="card-body">
                    <div class="card-img cart-img__max"
                         :style="{backgroundImage:'url(' + getImgPath(post.img) + ')' }"
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
      post: null,
      title: null
    }
  },
  mounted () {
    const id = this.$route.params.id
    this.getResult(id)
  },
  methods: {
    getImgPath (imgPath) {
      return imgPath || '../img/default.jpeg'
    },
    getResult (id) {
      const url = 'http://127.0.0.1:8000/api/v1/post/show/' + id
      // eslint-disable-next-line no-undef
      axios
        .get(url)
        .then(response => {
          this.post = response.data.post
          console.log(response)
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
