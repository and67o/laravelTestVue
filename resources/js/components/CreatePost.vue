<template>
    <form @submit.prevent="create()">
        <h3>Создать пост</h3>
        <div class="form-group">
            <label>
                <input name="title" type="text" class="form-control" v-model="title" value="">
            </label>
        </div>
        <div class="form-group">
            <label>
                <textarea name="descr" rows="10" class="form-control" v-model="descr" ></textarea>
            </label>
        </div>
        <div class="form-group">
            <input name="img" type="file">
        </div>

        <input type="submit" value="Создать пост" class="btn btn-outline-success">
    </form>
</template>
<script>
export default {
  data () {
    return {
        title: '',
        descr: ''
    }
  },
  mounted () {

  },
  methods: {
    create () {

    }
  }
}
</script>
