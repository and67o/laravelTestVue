<template>
    <div>
        <div class="row">
            <div class="span12">
                <form class="form-horizontal" @submit.prevent="login(input.email, input.password)">
                    <fieldset>
                        <div>
                            <legend class="">Login</legend>
                        </div>
                        <Input
                            nameField="Email"
                            target="email"
                            type="email"
                            placeholder="Email"
                            v-model="input.email"
                            :error=getError().email
                        />

                        <Input
                            nameField="Password"
                            target="password"
                            type="password"
                            placeholder="Password"
                            v-model="input.password"
                            :error=getError().password
                        />
                        <div class="control-group">
                            <div class="controls">
                                <button class="btn btn-success">Login</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
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
        email: '',
        password: ''
      },
      errors: []
    }
  },
  mounted () {
  },
  methods: {
    getError () {
      return this.$store.state.errors
    },
    login (email, password) {
      this.$store
        .dispatch('login', { email, password })
        .then(() => this.$router.push({ name: 'home' }))
        .catch(() => false)
    }
  }
}
</script>
