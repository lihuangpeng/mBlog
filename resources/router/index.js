import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);

let platform;
if (!/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
    platform = 'pc';
} else {
    platform = 'mobile';
}

const routes = [
    {
        path: '/', name: "Home", component: function () {
            return import("@Views/common/Home.vue");
    }
    },
    {
        path:'/video',name:'Video',component:function () {
            return import("@Views/video/Lists.vue");
    }
    },
    {
        path:'/video/create',name:'CreateVideo',component:function () {
        return import("@Views/video/Create.vue");
    }
    },
    {
        path:'/views/video/:id(\\d+\.html)',component:function () {
        return import("@Views/video/Show.vue");
    }
    },
    {
        path:'/posts',name:'Posts',component:function () {
        return import("@Views/posts/Lists.vue");
    }
    },
    {
        path:'/posts/create',name:'CreatePosts',component:function () {
        return import("@Views/posts/Create.vue");
    }
    },
    {
        path:'/views/posts/:id(\\d+\.html)',component:function () {
        return import("@Views/posts/Show.vue");
    }
    },
    {
        path:'/about',name:'About',component:function () {
        return import("@Views/About.vue");
    }
    },
    {
        path:'/guest_books',name:'GuestBooks',component:function () {
        return import("@Views/GuestBooks.vue");
    }
    },
    {
        path:'/user_center',name:'UserCenter',component:function () {
        return import("@Views/UserCenter.vue");
    }
    },
    {
        path: '*', redirect: '/'
    },
]

const router = new VueRouter({
    mode: "history",
    routes
});

export default router;