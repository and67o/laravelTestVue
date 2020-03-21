<template>
    <form @submit.prevent="create()" enctype="multipart/form-data">
        <h3>Создать пост</h3>
        <div class="form-group">
            <label>
                <input
                    name="title"
                    type="text"
                    class="form-control"
                    v-model="title"
                >
            </label>
        </div>
        <div class="form-group">
            <label>
                <textarea
                    name="descr"
                    rows="10"
                    class="form-control"
                    v-model="descr"
                ></textarea>
            </label>
        </div>
        <div class="form-group">
            <input name="img" type="file" @change="fileChange">
        </div>

        <input type="submit" value="Создать пост" class="btn btn-outline-success">
    </form>
</template>
<script>
export default {
  data () {
    return {
      title: '',
      descr: '',
      form: new FormData()
    }
  },
  mounted () {

  },
  methods: {
    create () {
      this.form.append('title', this.title)
      this.form.append('descr', this.title)
      axios
        .post('/v1/post', this.form)
        .then(response => {
          console.log(response)
        })
        .catch(response => {
          console.log(response)
        })
    },
    fileChange (event) {
        this.form.append('img', event.target.files[0])
    }
  }
}
</script>
