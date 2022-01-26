window.Vue = require("vue");

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import App from "./components/App.vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./components/Home";
import PostsIndex from "./components/posts/PostsIndex";
import PostsShow from "./components/posts/PostsShow";

const routes = [
    { path: "", name: "home", component: Home },
    { path: "/posts", name: "postsIndex", component: PostsIndex },
    { path: "/posts/:slug", name: "postsShow", component: PostsShow },
];

// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = new VueRouter({
    mode: "history",
    linkExactActiveClass: "active",
    routes: routes,
});

const app = new Vue({
    el: "#app",
    router,
    render: (h) => h(App),
});
