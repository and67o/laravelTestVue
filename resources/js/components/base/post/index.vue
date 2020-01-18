<template>
    <div class="card col-6">
        <div class="card-header">
            <h2>{{ post.short_title }}</h2>
        </div>
        <div class="card-body">
            <div class="card-img"
                 v-bind:style="{backgroundImage:'url(' + getImgPath(post.img) + ')' }"
            ></div>
            <p class="card-author">Автор: {{ post.name }}</p>
            <router-link
                class="btn btn-outline-primary"
                :to="{ name: 'post', params: { id: post.post_id } }"
            >Посмотреть пост
            </router-link>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['post'],
        data() {
            return {}
        },
        mounted() {
        },
        methods: {
            getImgPath(imgPath) {
                return imgPath ? imgPath : '../img/default.jpeg';
            }
        }
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

