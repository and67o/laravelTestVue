<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <NavbarMenuList/>
        <NavbarSearch/>
    </nav>
</template>

<script>
	import NavbarSearch from './Navbar-search.vue';
	import NavbarMenuList from './Navbar-menu-list.vue';

	export default {
		components: {
			NavbarSearch,
			NavbarMenuList
		},
		data: function () {
			return {}
		},
		mounted() {},
		methods: {}
	}
</script>
