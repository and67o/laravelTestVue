<template>
    <form @submit.prevent="create()" enctype="multipart/form-data">
        <h3>Create Post</h3>

        <Input
            nameField="Title"
            target="title"
            type="text"
            id="title"
            placeholder=""
            v-model="title"
            error="title"
        />

        <Textarea
            nameField="Description"
            name="descr"
            rows="10"
            v-model="descr"
            error="descr"
        />

        <div class="form-group">
            <input name="img" type="file" @change="fileChange">
        </div>

        <input type="submit" value="Создать пост" class="btn btn-outline-success">
    </form>
</template>
<script>
import Input from './base/tags/Input'
import Textarea from './base/tags/Textarea'
export default {
  components: {
    Input,
    Textarea
  },
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
    getError () {
      return this.$store.state.errors
    },
    create () {
      this.form.append('title', this.title)
      this.form.append('descr', this.descr)
      this.$store
        .dispatch('createPost', this.form)
        .then(response => {
          const { data, status } = response
          if (status === 200) {
            this.$router.push({
              name: 'post',
              params: { id: data.id }
            })
          }
        })
        .catch(() => false)
    },
    fileChange (event) {
      this.form.append('img', event.target.files[0])
    }
  }
}
</script>
