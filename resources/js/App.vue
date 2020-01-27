<template>
    <div>
        <Navbar/>
        <div class="container">
            <router-view/>
        </div>
    </div>
</template>

<script>
    import Navbar from './components/base/navbar/';

    export default {
        components: {
            Navbar,
        },
        data: function () {
            return {}
        },
        mounted() {
        },
        methods: {}
    }
</script>
<style lang="css">
    body {
        background: #fff;
    }

    nav {
        margin-bottom: 15px;
    }
</style>
