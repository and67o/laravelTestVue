<template>
    <div class="content">
        <section v-if="errors">
            <p>We're sorry, we're not able to retrieve this information at the moment, please try back later</p>
        </section>
        <div v-else class="row">
            <PostCard
                v-for="post in posts"
                v-bind:post="post"
                v-bind:key="post.post_id"
            />
        </div>
    </div>
</template>
<script>
    import PostCard from "./base/post/";

    export default {
        components: {
            PostCard,
        },
        data() {
            return {
                posts: null,
                errors: false,
                loading: true,
                image: '../img/default.jpeg'
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
<style lang="scss">
    .card {
        margin-bottom: 10px;

        &-img {
            height: 200px;
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
        }

        &-btn {
            display: flex;

            a {
                margin-right: 10px;
            }
        }

        &-img, &-author &-date {
            margin-bottom: 10px;
        }

        &-descr {
            margin-bottom: 10px;
        }

        &-img__max {
            height: 500px;
        }
    }
</style>
