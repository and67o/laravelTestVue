<template>
    <div>
        <form class="form-horizontal" @submit.prevent="register" action="POST">
            <fieldset>
                <div id="legend">
                    <legend class="">Register</legend>
                </div>

                <Input
                    nameField="Name"
                    target="name"
                    type="name"
                    id="name"
                    placeholder="Name"
                    v-model="input.name"
                    :error=getError().name
                />
                <Input
                    nameField="Email"
                    target="email"
                    type="email"
                    id="email"
                    placeholder="Email"
                    v-model="input.email"
                    :error=getError().email
                />

                <Input
                    nameField="Password"
                    target="password"
                    type="password"
                    id="password"
                    placeholder="Password"
                    v-model="input.password"
                    :error=getError().password
                />

                <Input
                    nameField="Confirm Password"
                    target="password"
                    type="password"
                    id="c_password"
                    placeholder="Password"
                    v-model="input.c_password"
                    :error=getError().c_password
                />

                <div class="control-group">
                    <div class="controls">
                        <button class="btn btn-success" @:click.prevent="register()">Login</button>
                    </div>
                    {{ error }}
                </div>
            </fieldset>
        </form>
    </div>
</template>
<script>
import Input from './base/tags/Input'

export default {
  components: {
    Input
  },
  data: function () {
    return {
      input: {
        name: '',
        email: '',
        password: '',
        c_password: ''
      },
      error: ''
    }
  },
  mounted () {
  },
  methods: {
    getError () {
      return this.$store.state.errors
    },
    // TODO добавить валидацию
    register () {
      this.$store
        .dispatch('register', this.input)
        .then(() => this.$router.push({ name: 'home' }))
        .catch(() => false)
    }
  }
}
</script>
