<template>
    <section class="mblog-user-center-wrapper">
        <el-row :gutter="15">
            <el-col :sm="5">
                <el-card style="margin-top: 10px;margin-bottom: 10px;" class="mblog-user-center-left-wrapper">
                    <el-row class="mblog-user-info-left-wrapper">
                        <el-col :sm="24" :xs="8">
                            <el-image :src="header_img"/>
                        </el-col>
                        <el-col :sm="24" :xs="8">
                            <p style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">
                                {{plat_user_name}}</p>
                            <p><img :src="require('@Assets/images/vip.png').default"></p>
                            <el-button type="primary" plain>续费</el-button>
                        </el-col>
                    </el-row>
                    <el-row>
                        <ul>
                            <li @click="show = 1">
                                <i class="el-icon el-icon-postcard"></i>我的文章
                            </li>
                            <li @click="show = 5">
                                <i class="el-icon el-icon-postcard"></i>我的视频
                            </li>
                            <li @click="show = 2">
                                <i class="el-icon el-icon-time"></i>阅读历史
                            </li>
                            <li @click="show = 3">
                                <i class="el-icon el-icon-notebook-1"></i>购买记录
                            </li>
                            <li @click="show = 4">
                                <i class="el-icon el-icon-message"></i>我的评论
                            </li>
                        </ul>
                    </el-row>
                </el-card>
            </el-col>
            <el-col :sm="19" style="margin-bottom: 10px;">
                <el-card style="margin-top: 10px;">
                    <section v-if="show == 5" class="mblog-user-center-right-container">
                        <h2 class="mblog-title">
                            我的视频
                        </h2>
                        <section class="mblog-user-center-button-group">
                            <el-button>已发布</el-button>
                            <el-button>审核中</el-button>
                            <el-button>已拒绝</el-button>
                            <el-button>草稿箱</el-button> | <el-button @click="$router.push({path:'/video/create'})">新增视频</el-button>
                        </section>
                        <p v-if="video_list.length == 0">你暂时还没有视频哦~</p>
                        <VideoList :list="video_list" :line_count=4  v-else></VideoList>
                        <el-pagination
                           background
                           :page-size="video_list.length"
                           :pager-count="5"
                           layout="prev, pager, next"
                           :total="20">
                        </el-pagination>
                    </section>
                    <section v-if="show == 1" class="mblog-user-center-right-container">
                        <h2 class="mblog-title">
                            我的文章
                        </h2>
                        <section class="mblog-user-center-button-group">
                            <el-button>已发布</el-button>
                            <el-button>审核中</el-button>
                            <el-button>已拒绝</el-button>
                            <el-button>草稿箱</el-button> | <el-button @click="$router.push({path:'/posts/create'})">新增文章</el-button>
                        </section>
                        <p v-if="posts_list.length == 0">你暂时还没有文章哦~</p>
                        <PostsList :list="posts_list" v-else></PostsList>
                        <el-pagination
                            background
                            :page-size="posts_list.length"
                            :pager-count="5"
                            layout="prev, pager, next"
                            :total="20">
                        </el-pagination>
                    </section>
                    <section v-if="show == 2" class="mblog-user-center-right-container">
                        <h2 class="mblog-title">阅读历史</h2>
                        <p>你暂时还没有阅读记录哦~</p>
                    </section>
                    <section v-if="show == 3" class="mblog-user-center-right-container">
                        <h2 class="mblog-title">购买记录</h2>
                        <p>你暂时还没有购买记录哦~</p>
                    </section>
                    <section v-if="show == 4" class="mblog-user-center-right-container">
                        <h2 class="mblog-title">我的评论</h2>
                        <p>你暂时还没有评论哦~</p>
                    </section>
                </el-card>
            </el-col>
        </el-row>
        </el-card>
    </section>
</template>

<script>
    import PostsList from "@Components/PostsList.vue";
    import VideoList from "@Components/VideoList.vue"
    export default{
        name: 'About',
        components: {
            PostsList,
            VideoList
        },
        data: function () {
            return {
                header_img: require('@Assets/images/default_header_img.jpg').default,
                plat_user_name: '',
                show: 1,
                video_list: [
                    {
                        image: require('@Assets/images/jc.jpg').default,
                        'title': '第一节 这是一个博客视频',
                        'content': '这是一个按揭房卡老顾客垃圾股卡拉胶赶快拉进来卡视角发了房间辣椒粉'
                    },
                    {
                        image: require('@Assets/images/jc.jpg').default,
                        'title': '第一节 这是一个博客视频',
                        'content': '这是一个按揭房卡老顾客垃圾股卡拉胶赶快拉进来卡视角发了房间辣椒粉'
                    },
                    {
                        image: require('@Assets/images/jc.jpg').default,
                        'title': '第一节 这是一个博客视频',
                        'content': '这是一个按揭房卡老顾客垃圾股卡拉胶赶快拉进来卡视角发了房间辣椒粉'
                    },
                    {
                        image: require('@Assets/images/jc.jpg').default,
                        'title': '第一节 这是一个博客视频',
                        'content': '这是一个按揭房卡老顾客垃圾股卡拉胶赶快拉进来卡视角发了房间辣椒粉'
                    },
                ],
                posts_list:[
                    {
                        image: require('@Assets/images/videobg.jpg').default,
                        'title': '如何建立个人博客？',
                        'username':'李煌鹏',
                        'create_date':'2014-06-05 10:24:00',
                        'type':'PHP',
                        'content': '1111111111111111111111111111111111111111想必很多人都想建立一个，属于自己的个人博客，把自己的一些学习的经验和经历，通过互联网的形式来分享给别人。通过分享与网友进行互动，让更多的人了解和认识你，并且树立自己在互联网上的个人品牌，其实这就是一种“自媒体”。那么我们怎么去建立自己独立...'
                    },
                    {
                        image: require('@Assets/images/videobg.jpg').default,
                        'title': '如何建立个人博客？',
                        'username':'李煌鹏',
                        'create_date':'2014-06-05 10:24:00',
                        'type':'PHP',
                        'content': '11111111111111111111111111111111111111111111想必很多人都想建立一个，属于自己的个人博客，把自己的一些学习的经验和经历，通过互联网的形式来分享给别人。通过分享与网友进行互动，让更多的人了解和认识你，并且树立自己在互联网上的个人品牌，其实这就是一种“自媒体”。那么我们怎么去建立自己独立...'
                    },
                ],
                history_list: [],
                comments_list: [],
                orders_list: []
            }
        },
        methods: {
            goBack: function () {
                this.$parent.$refs.header.menu_click('Home');
            }
        },
        created: function () {
            let header_img = window.localStorage.getItem('header_img');
            if (header_img) {
                this.header_img = header_img;
            }
            let plat_user_name = window.localStorage.getItem('plat_user_name');
            if (plat_user_name) {
                this.plat_user_name = plat_user_name;
            }
        }
    }
</script>
<style>
    .mblog-user-center-wrapper .el-card {
        border-radius: 0;
    }

    .mblog-user-center-wrapper {
        min-height: 450px;
    }

    .mblog-user-center-wrapper .mblog-user-center-left-wrapper .el-card__body {
        padding: 0;
    }

    .mblog-user-center-wrapper .mblog-user-info-left-wrapper {
        text-align: center;
        background-color: #fbf2ef;
        padding: 31px 0;
    }

    .mblog-user-center-wrapper .mblog-user-info-left-wrapper img {
        width: 20px;
        height: 20px;
        cursor: pointer;
    }

    .mblog-user-center-wrapper .mblog-user-info-left-wrapper p {
        height: 30px;
        line-height: 30px;
    }

    .mblog-user-center-wrapper .mblog-user-info-left-wrapper .el-image img {
        width: 62px;
        height: 62px;
        border-radius: 50%;
    }

    .mblog-user-center-wrapper .el-button {
        padding: 5px 10px;
    }

    .mblog-user-center-wrapper .mblog-user-center-left-wrapper ul li {
        text-align: center;
        width: 100%;
        padding: 15px 0;
        font-size: 15px;
        cursor: pointer;
        border-bottom: 1px solid #ccc;
    }

    .mblog-user-center-wrapper .mblog-user-center-left-wrapper ul li i {
        font-size: 15px;
        padding-right: 10px;
    }

    .mblog-user-center-wrapper .mblog-user-center-left-wrapper ul li:hover {
        color: #409eff;
    }

    .mblog-user-center-wrapper .mblog-user-center-left-wrapper ul li:last-child {
        border-bottom: none;
    }

    .mblog-user-center-wrapper  .mblog-user-center-button-group{
        margin-bottom:10px;
    }

    .mblog-user-center-right-container > p {
        font-size: 18px;
        min-height: 300px;
        text-align: center;
        line-height: 300px;
    }
    .mblog-user-center-right-container .el-button+.el-button{
        margin-left: 0;
    }
</style>