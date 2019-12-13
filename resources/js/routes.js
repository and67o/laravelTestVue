import Home from './components/Home.vue';
// import Register from './components/Register.vue';
// import Login from './components/Login.vue';

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    // {
    //     path: '/register',
    //     name: 'register',
    //     component: Register,
    //     meta: {
    //         auth: false
    //     }
    // },
    // {
    //     path: '/login',
    //     name: 'login',
    //     component: Login,
    //     meta: {
    //         auth: false
    //     }
    // },
];

export default routes;
