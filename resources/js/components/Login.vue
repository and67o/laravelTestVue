<template>
<!--    TODO Переписать на бутстрап вью-->
    <div>
        <div class="row">
            <div class="span12">
                <div v-if="errors.length">
                    <b>Please correct the following error(s):</b>
                    <ul>
                        <li v-for="error in errors">{{ error }}</li>
                    </ul>
                </div>
                <form class="form-horizontal" v-on:submit.prevent="login(input.email, input.password)">
                    <fieldset>
                        <div>
                            <legend class="">Login</legend>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="username">Email</label>
                            <div class="controls">
                                <input type="text" id="username" name="username" placeholder="Email" v-model="input.email"
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
    export default {
        data: function () {
            return {
                input: {
                    email: '',
                    password: '',
                },
                errors: []
            }
        },
        mounted() {
        },
        methods: {
            login(email, password) {
                this.errors = [];
                if (!this.name) {
                    this.errors.push('Name');
                }
                if (!this.age) {
                    this.errors.push('Age');
                }
                if (email && password) {
                    this.$store
                        .dispatch('auth/login', {email, password})
                        .then(() => this.$router.push({name: "home"}));
                }
            }
        }
    }
</script>
