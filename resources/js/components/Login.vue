<template>
    <div>
        <div class="row">
            <div class="span12">
                <form class="form-horizontal" action='' method="POST">
                    <fieldset>
                        <div id="legend">
                            <legend class="">Login</legend>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="username">Email</label>
                            <div class="controls">
                                <input type="text" id="username" name="username" placeholder="Email" v-model="input.username"
                                       class="input-xlarge">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="password">Password</label>
                            <div class="controls">
                                <input type="password" id="password" name="password" placeholder="Password" v-model="input.password"
                                       class="input-xlarge">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button class="btn btn-success" v-on:click.prevent="login()">Login</button>
                            </div>
                            {{  error }}
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data: function () {
            return {
                input: {
                    username: '',
                    password: '',
                },
                error: ''
            }
        },
        mounted() {
        },
        methods: {
            // TODO добавить валидацию
            login() {
                const username = this.input.username;
                const password = this.input.password;
                if (!username || !password) {
                    this.error = 'Введите все данные';
                }
                axios
                    .post('http://127.0.0.1:8000/api/v1/login', {
                            email: username,
                            password: password
                    })
                    .then(response => {
                        console.log(response);
                    })
                    .catch(e => {
                        console.log(e);
                    });
            }
        }
    }
</script>
