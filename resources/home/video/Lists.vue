<template>
    <section class="mblog-video-wrapper">
        <el-container>
            <el-row :gutter="30">
                <el-col>
                    <el-breadcrumb separator-class="el-icon-arrow-right" style="font-size: 18px;">
                        <el-breadcrumb-item><a href="javascript:;" @click="goBack()">首页</a></el-breadcrumb-item>
                        <el-breadcrumb-item>视频教程</el-breadcrumb-item>
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
                <el-col :sm="17" class="mblog-home-video-wrapper" style="margin-top: 20px;">
                    <VideoList :list="video_list" :line_count=3></VideoList>
                    <el-row style="margin-bottom:10px;">
                        <el-pagination
                                layout="prev, pager, next"
                                :page-count=10
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
    import VideoList from "@Components/VideoList";
    export default{
        name:'Video',
        components:{
            Right,
            VideoList,
        },
        methods:{
            goBack:function () {
                this.$parent.$refs.header.menu_click('Home');
            }
        },
        data:function () {
            return {
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