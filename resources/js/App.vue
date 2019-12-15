<template>
    <div class="panel panel-default">
        <Navbar/>
        <PassportClients/>
        <PassportAuthorizedClients/>
        <PassportPersonalAccessTokens/>
        <div class="panel-body">
            <router-view/>
        </div>
    </div>
</template>

<script>
    import Navbar from './components/base/navbar/index';
    import PassportPersonalAccessTokens from './components/passport/PersonalAccessTokens.vue';
    import PassportClients from './components/passport/Clients.vue';
    import PassportAuthorizedClients from './components/passport/AuthorizedClients.vue';

    export default {
        components: {
            Navbar,
            // PassportClients,
            // PassportAuthorizedClients,
            // PassportPersonalAccessTokens,
        },
        data: function () {
            return {}
        },
        mounted() {
        },
        methods: {}
    }
</script>
