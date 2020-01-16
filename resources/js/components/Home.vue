<template>
    <div class="content">
        <section v-if="errors">
            <p>We're sorry, we're not able to retrieve this information at the moment, please try back later</p>
        </section>
        <div class="row">
            <div v-for="post in posts" class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h2>{{ post.short_title }}</h2>
                    </div>
                    <div class="card-body">
                        <div class="card-author">Автор: {{ post.name }}</div>
                        <router-link class="btn btn-outline-primary" :to="{ name: 'post', params: { id: post.post_id } }">Посмотреть пост</router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                posts: null,
                errors: false,
                loading: true,
            }
        },
        mounted() {
            axios
                .get('http://127.0.0.1:8000/api/v1/posts')
                .then(response => {
                    this.posts = response.data.posts.data;
                })
                .catch(e => {
                    console.log(e);
                })
                .finally(() => (
                    this.loading = false)
                );
        },
        methods: {}
    }
</script>
