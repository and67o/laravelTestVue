<template>
    <div class="panel panel-default">
        <Navbar/>
        <div class="panel-body">
            <router-view/>
        </div>
    </div>
</template>

<script>
    import Navbar from './components/base/navbar/index';

    export default {
        components: {
            Navbar
        },
        data: function () {
            return {}
        },
        mounted() {
        },
        methods: {}
    }
</script>
