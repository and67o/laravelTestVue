<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <NavbarMenuList/>
        <NavbarSearch/>
        <NavbarMenuAuth/>
    </nav>
</template>

<script>
	import NavbarSearch from './Navbar-search.vue';
	import NavbarMenuList from './Navbar-menu-list.vue';
    import NavbarMenuAuth from './Navbar-menu-auth';

    export default {
		components: {
			NavbarSearch,
			NavbarMenuList,
            NavbarMenuAuth
		},
		data: function () {
			return {}
		},
		mounted() {},
		methods: {}
	}
</script>
