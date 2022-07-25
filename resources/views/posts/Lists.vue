<template>
    <section class="mblog-video-wrapper">
        <el-container>
            <el-row :gutter="30">
                <el-col class="mblog-posts-back-title">
                    <el-breadcrumb separator-class="el-icon-arrow-right" style="font-size: 18px;">
                        <el-breadcrumb-item><a href="javascript:;" @click="goBack()">首页</a></el-breadcrumb-item>
                        <el-breadcrumb-item>文章教程</el-breadcrumb-item>
                    </el-breadcrumb>
                </el-col>
                <el-col class="mblog-posts-category">
                    <ul>
                        <li>
                            <a href="javascript:;">服务端语言</a>
                        </li>
                        <li>
                            <a href="javascript:;">数据库</a>
                        </li>
                        <li>
                            <a href="javascript:;">消息队列</a>
                        </li>
                        <li><a href="javascript:;">WEB前端</a></li>
                        <li>
                            <a href="javascript:;">LIUNX操作系统</a>
                        </li>
                        <li>
                            <a href="javascript:;">代码管理</a>
                        </li>
                        <li>
                            <a href="javascript:;">WEB服务器</a>
                        </li>
                        <li><a href="javascript:;">小程序</a></li>
                    </ul>
                </el-col>
                <el-col :sm="17" class="mblog-home-posts-wrapper" style="margin-top: 20px;">
                    <PostsList :list="posts_list"></PostsList>
                    <el-row style="margin-bottom:10px;">
                        <el-pagination
                                layout="prev, pager, next"
                                :page-count=20
                                :pager-count=5
                                :total="100">
                        </el-pagination>
                    </el-row>
                </el-col>
                <el-col :sm="7" class="hidden-xs-only" style="margin-top: 20px;">
                    <Right ref="right"></Right>
                </el-col>
            </el-row>
        </el-container>
    </section>
</template>

<script type="text/javascript">
    import Right from "@Views/common/Right";
    import PostsList from "@Components/PostsList";
    export default{
        name:'Video',
        components:{
            Right,
            PostsList,
        },
        methods:{
            goBack:function () {
                this.$parent.$refs.header.menu_click('Home');
            }
        },
        data:function () {
            return {
                posts_list: [
                    {
                        image: require('@Assets/images/videobg.jpg').default,
                        'title': '如何建立个人技术分享？',
                        'username':'李煌鹏',
                        'create_date':'2014-06-05 10:24:00',
                        'type':'PHP',
                        'content': '1111111111111111111111111111111111111111想必很多人都想建立一个，属于自己的个人技术分享，把自己的一些学习的经验和经历，通过互联网的形式来分享给别人。通过分享与网友进行互动，让更多的人了解和认识你，并且树立自己在互联网上的个人品牌，其实这就是一种“自媒体”。那么我们怎么去建立自己独立...'
                    },
                    {
                        image: require('@Assets/images/videobg.jpg').default,
                        'title': '如何建立个人技术分享？',
                        'username':'李煌鹏',
                        'create_date':'2014-06-05 10:24:00',
                        'type':'PHP',
                        'content': '11111111111111111111111111111111111111111111想必很多人都想建立一个，属于自己的个人技术分享，把自己的一些学习的经验和经历，通过互联网的形式来分享给别人。通过分享与网友进行互动，让更多的人了解和认识你，并且树立自己在互联网上的个人品牌，其实这就是一种“自媒体”。那么我们怎么去建立自己独立...'
                    },
                    {
                        image: require('@Assets/images/videobg.jpg').default,
                        'title': '如何建立个人技术分享？',
                        'username':'李煌鹏',
                        'create_date':'2014-06-05 10:24:00',
                        'type':'PHP',
                        'content': '11111111111111111111111111111111111111111111想必很多人都想建立一个，属于自己的个人技术分享，把自己的一些学习的经验和经历，通过互联网的形式来分享给别人。通过分享与网友进行互动，让更多的人了解和认识你，并且树立自己在互联网上的个人品牌，其实这就是一种“自媒体”。那么我们怎么去建立自己独立...'
                    },
                    {
                        image: require('@Assets/images/videobg.jpg').default,
                        'title': '如何建立个人技术分享？',
                        'username':'李煌鹏',
                        'create_date':'2014-06-05 10:24:00',
                        'type':'PHP',
                        'content': '1111111111111111111111111111111111111111想必很多人都想建立一个，属于自己的个人技术分享，把自己的一些学习的经验和经历，通过互联网的形式来分享给别人。通过分享与网友进行互动，让更多的人了解和认识你，并且树立自己在互联网上的个人品牌，其实这就是一种“自媒体”。那么我们怎么去建立自己独立...'
                    },
                    {
                        image: require('@Assets/images/videobg.jpg').default,
                        'title': '如何建立个人技术分享？',
                        'username':'李煌鹏',
                        'create_date':'2014-06-05 10:24:00',
                        'type':'PHP',
                        'content': '11111111111111111111111111111111111111111111想必很多人都想建立一个，属于自己的个人技术分享，把自己的一些学习的经验和经历，通过互联网的形式来分享给别人。通过分享与网友进行互动，让更多的人了解和认识你，并且树立自己在互联网上的个人品牌，其实这就是一种“自媒体”。那么我们怎么去建立自己独立...'
                    },
                    {
                        image: require('@Assets/images/videobg.jpg').default,
                        'title': '如何建立个人技术分享？',
                        'username':'李煌鹏',
                        'create_date':'2014-06-05 10:24:00',
                        'type':'PHP',
                        'content': '11111111111111111111111111111111111111111111想必很多人都想建立一个，属于自己的个人技术分享，把自己的一些学习的经验和经历，通过互联网的形式来分享给别人。通过分享与网友进行互动，让更多的人了解和认识你，并且树立自己在互联网上的个人品牌，其实这就是一种“自媒体”。那么我们怎么去建立自己独立...'
                    },
                    {
                        image: require('@Assets/images/videobg.jpg').default,
                        'title': '如何建立个人技术分享？',
                        'username':'李煌鹏',
                        'create_date':'2014-06-05 10:24:00',
                        'type':'PHP',
                        'content': '1111111111111111111111111111111111111111想必很多人都想建立一个，属于自己的个人技术分享，把自己的一些学习的经验和经历，通过互联网的形式来分享给别人。通过分享与网友进行互动，让更多的人了解和认识你，并且树立自己在互联网上的个人品牌，其实这就是一种“自媒体”。那么我们怎么去建立自己独立...'
                    },
                    {
                        image: require('@Assets/images/videobg.jpg').default,
                        'title': '如何建立个人技术分享？',
                        'username':'李煌鹏',
                        'create_date':'2014-06-05 10:24:00',
                        'type':'PHP',
                        'content': '11111111111111111111111111111111111111111111想必很多人都想建立一个，属于自己的个人技术分享，把自己的一些学习的经验和经历，通过互联网的形式来分享给别人。通过分享与网友进行互动，让更多的人了解和认识你，并且树立自己在互联网上的个人品牌，其实这就是一种“自媒体”。那么我们怎么去建立自己独立...'
                    },
                    {
                        image: require('@Assets/images/videobg.jpg').default,
                        'title': '如何建立个人技术分享？',
                        'username':'李煌鹏',
                        'create_date':'2014-06-05 10:24:00',
                        'type':'PHP',
                        'content': '11111111111111111111111111111111111111111111想必很多人都想建立一个，属于自己的个人技术分享，把自己的一些学习的经验和经历，通过互联网的形式来分享给别人。通过分享与网友进行互动，让更多的人了解和认识你，并且树立自己在互联网上的个人品牌，其实这就是一种“自媒体”。那么我们怎么去建立自己独立...'
                    },
                    {
                        image: require('@Assets/images/videobg.jpg').default,
                        'title': '如何建立个人技术分享？',
                        'username':'李煌鹏',
                        'create_date':'2014-06-05 10:24:00',
                        'type':'PHP',
                        'content': '11111111111111111111111111111111111111111111想必很多人都想建立一个，属于自己的个人技术分享，把自己的一些学习的经验和经历，通过互联网的形式来分享给别人。通过分享与网友进行互动，让更多的人了解和认识你，并且树立自己在互联网上的个人品牌，其实这就是一种“自媒体”。那么我们怎么去建立自己独立...'
                    },
                    {
                        image: require('@Assets/images/videobg.jpg').default,
                        'title': '如何建立个人技术分享？',
                        'username':'李煌鹏',
                        'create_date':'2014-06-05 10:24:00',
                        'type':'PHP',
                        'content': '1111111111111111111111111111111111111111想必很多人都想建立一个，属于自己的个人技术分享，把自己的一些学习的经验和经历，通过互联网的形式来分享给别人。通过分享与网友进行互动，让更多的人了解和认识你，并且树立自己在互联网上的个人品牌，其实这就是一种“自媒体”。那么我们怎么去建立自己独立...'
                    },
                    {
                        image: require('@Assets/images/videobg.jpg').default,
                        'title': '如何建立个人技术分享？',
                        'username':'李煌鹏',
                        'create_date':'2014-06-05 10:24:00',
                        'type':'PHP',
                        'content': '11111111111111111111111111111111111111111111想必很多人都想建立一个，属于自己的个人技术分享，把自己的一些学习的经验和经历，通过互联网的形式来分享给别人。通过分享与网友进行互动，让更多的人了解和认识你，并且树立自己在互联网上的个人品牌，其实这就是一种“自媒体”。那么我们怎么去建立自己独立...'
                    },
                    {
                        image: require('@Assets/images/videobg.jpg').default,
                        'title': '如何建立个人技术分享？',
                        'username':'李煌鹏',
                        'create_date':'2014-06-05 10:24:00',
                        'type':'PHP',
                        'content': '11111111111111111111111111111111111111111111想必很多人都想建立一个，属于自己的个人技术分享，把自己的一些学习的经验和经历，通过互联网的形式来分享给别人。通过分享与网友进行互动，让更多的人了解和认识你，并且树立自己在互联网上的个人品牌，其实这就是一种“自媒体”。那么我们怎么去建立自己独立...'
                    },
                    {
                        image: require('@Assets/images/videobg.jpg').default,
                        'title': '如何建立个人技术分享？',
                        'username':'李煌鹏',
                        'create_date':'2014-06-05 10:24:00',
                        'type':'PHP',
                        'content': '1111111111111111111111111111111111111111想必很多人都想建立一个，属于自己的个人技术分享，把自己的一些学习的经验和经历，通过互联网的形式来分享给别人。通过分享与网友进行互动，让更多的人了解和认识你，并且树立自己在互联网上的个人品牌，其实这就是一种“自媒体”。那么我们怎么去建立自己独立...'
                    },
                    {
                        image: require('@Assets/images/videobg.jpg').default,
                        'title': '如何建立个人技术分享？',
                        'username':'李煌鹏',
                        'create_date':'2014-06-05 10:24:00',
                        'type':'PHP',
                        'content': '11111111111111111111111111111111111111111111想必很多人都想建立一个，属于自己的个人技术分享，把自己的一些学习的经验和经历，通过互联网的形式来分享给别人。通过分享与网友进行互动，让更多的人了解和认识你，并且树立自己在互联网上的个人品牌，其实这就是一种“自媒体”。那么我们怎么去建立自己独立...'
                    },
                    {
                        image: require('@Assets/images/videobg.jpg').default,
                        'title': '如何建立个人技术分享？',
                        'username':'李煌鹏',
                        'create_date':'2014-06-05 10:24:00',
                        'type':'PHP',
                        'content': '11111111111111111111111111111111111111111111想必很多人都想建立一个，属于自己的个人技术分享，把自己的一些学习的经验和经历，通过互联网的形式来分享给别人。通过分享与网友进行互动，让更多的人了解和认识你，并且树立自己在互联网上的个人品牌，其实这就是一种“自媒体”。那么我们怎么去建立自己独立...'
                    },
                    {
                        image: require('@Assets/images/videobg.jpg').default,
                        'title': '如何建立个人技术分享？',
                        'username':'李煌鹏',
                        'create_date':'2014-06-05 10:24:00',
                        'type':'PHP',
                        'content': '11111111111111111111111111111111111111111111想必很多人都想建立一个，属于自己的个人技术分享，把自己的一些学习的经验和经历，通过互联网的形式来分享给别人。通过分享与网友进行互动，让更多的人了解和认识你，并且树立自己在互联网上的个人品牌，其实这就是一种“自媒体”。那么我们怎么去建立自己独立...'
                    },
                    {
                        image: require('@Assets/images/videobg.jpg').default,
                        'title': '如何建立个人技术分享？',
                        'username':'李煌鹏',
                        'create_date':'2014-06-05 10:24:00',
                        'type':'PHP',
                        'content': '1111111111111111111111111111111111111111想必很多人都想建立一个，属于自己的个人技术分享，把自己的一些学习的经验和经历，通过互联网的形式来分享给别人。通过分享与网友进行互动，让更多的人了解和认识你，并且树立自己在互联网上的个人品牌，其实这就是一种“自媒体”。那么我们怎么去建立自己独立...'
                    },
                    {
                        image: require('@Assets/images/videobg.jpg').default,
                        'title': '如何建立个人技术分享？',
                        'username':'李煌鹏',
                        'create_date':'2014-06-05 10:24:00',
                        'type':'PHP',
                        'content': '11111111111111111111111111111111111111111111想必很多人都想建立一个，属于自己的个人技术分享，把自己的一些学习的经验和经历，通过互联网的形式来分享给别人。通过分享与网友进行互动，让更多的人了解和认识你，并且树立自己在互联网上的个人品牌，其实这就是一种“自媒体”。那么我们怎么去建立自己独立...'
                    },
                    {
                        image: require('@Assets/images/videobg.jpg').default,
                        'title': '如何建立个人技术分享？',
                        'username':'李煌鹏',
                        'create_date':'2014-06-05 10:24:00',
                        'type':'PHP',
                        'content': '11111111111111111111111111111111111111111111想必很多人都想建立一个，属于自己的个人技术分享，把自己的一些学习的经验和经历，通过互联网的形式来分享给别人。通过分享与网友进行互动，让更多的人了解和认识你，并且树立自己在互联网上的个人品牌，其实这就是一种“自媒体”。那么我们怎么去建立自己独立...'
                    }
                ],
            }
        }

    }
</script>

<style>
    .mblog-posts-category{
        list-style: none;
        width: 100%;
    }
    .mblog-posts-category li{
        text-align: center;
        margin: 15px 0  0 0;
        float: left;
        display: block;
        width: 25%;
    }

    .mblog-posts-category li a{
        padding: 10px;
        display: block;
        width: 70%;
        overflow: hidden;
        color: white;
        text-decoration: none;
        margin: auto;
        background-color: #868584;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>