<template>
    <div>
        <form class="form-horizontal" @submit.prevent="register" action="POST">
            <fieldset>
                <div id="legend">
                    <legend class="">Register</legend>
                </div>
                <div class="control-group">
                    <label class="control-label" for="name">Name</label>
                    <div class="controls">
                        <input type="text" id="name" name="username" placeholder="Name" v-model="input.name"
                               class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="email">Email</label>
                    <div class="controls">
                        <input type="text" id="email" name="username" placeholder="Email" v-model="input.email"
                               class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="password">Password</label>
                    <div class="controls">
                        <input type="password" id="password" name="password" placeholder="Password"
                               v-model="input.password"
                               class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="c_password">Confirm Password</label>
                    <div class="controls">
                        <input type="password" id="c_password" name="password" placeholder="Password"
                               v-model="input.c_password"
                               class="input-xlarge">
                    </div>
                </div>
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
export default {
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
    // TODO добавить валидацию
    register () {
      this.$store
        .dispatch('auth/register', this.input)
      // .then(() => this.$router.push({name: "home"}));
    }
  }
}
</script>
