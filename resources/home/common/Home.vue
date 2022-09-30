<template>
    <el-container class="mblog-home-container" style="display: block">
        <el-row style="width: 100%" class="mblog-main-header">
            <el-col :xs="24" :sm="12" class="mblog-home-carouse">
                <MCarouselFade :updateCallback="carouse_config.updateCallback" :autoplay="carouse_config.autoplay"
                               :active="carouse_config.active" pointBtnClass="mblog-home-carouse-point-btn">
                    <MCarouselFadeItem :name="index" :key="index" v-for="(item,index) in carouse_config.item_list">
                        <el-image
                                style="width: 100%; height: 100%"
                                :src="item.banner"></el-image>
                    </MCarouselFadeItem>
                </MCarouselFade>
            </el-col>
            <el-col :sm="5" class="hidden-xs-only" style="padding:0 0px 0 10px;">
                <ImageText style="margin-bottom:10px;" :src="require('@Assets/images/click_bg.jpg').default" text="如何制作一个WEB端登录SDK？" height=130></ImageText>
                <ImageText :src="require('@Assets/images/click_bg.jpg').default" text="对于如何制作一个自己的个人博客" height=130></ImageText>
            </el-col>
            <el-col :sm="7" class="hidden-xs-only" style="padding-left:10px;">
                <section class="mblog-home-mingpian">
                    <h2>我的名片</h2>
                    <p>网名：放下就是快乐</p>
                    <p>职业：PHP开发工程师</p>
                    <p>现居：广东省-广州市</p>
                    <p>Email：1648763407@qq.com</p>
                    <nav>
                        <ul>
                            <li><a href="https://github.com/lihuangpeng" target="_blank"><i class="icon iconfont icon-github"></i></a></li>
                            <li><a href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=1648763407@qq.com" target="_blank"><i class="icon iconfont icon-email"></i></a></li>
                            <li><a href="http://wpa.qq.com/msgrd?v=3&uin=1648763407&site=qq&menu=yes" target="_blank"><i class="icon iconfont icon-qq"></i></a></li>
                            <li><i class="icon iconfont icon-weixin"><el-image :src="weixin_img"></el-image></i></li>
                        </ul>
                    </nav>
                </section>
            </el-col>
        </el-row>
        <el-row :gutter="15" style="margin-top: 20px;">
            <el-col :xs="24" :sm="17">
                <el-row class="mblog-home-title mblog-home-video-title" style="margin-bottom:20px;">
                    <el-col :xs="24">
                        <span>视频教程学习</span>
                    </el-col>
                </el-row>
                <VideoList :list="video_list" :line_count=4></VideoList>
                <el-row class="mblog-home-title mblog-home-posts-title">
                    <el-col :xs="24">
                        <span>文章推荐</span>
                    </el-col>
                </el-row>
                <PostsList :list="posts_list"></PostsList>
            </el-col>
            <el-col :sm="7" class="hidden-xs-only">
                <Right ref="right"></Right>
            </el-col>
        </el-row>
        </el-row>
    </el-container>
</template>
<script>
    import MCarouselFade from "@Components/MCarouselFade";
    import MCarouselFadeItem from "@Components/MCarouselFadeItem";
    import PostsList from "@Components/PostsList";
    import VideoList from "@Components/VideoList";
    import ImageText from "@Components/ImageText";
    import Right from "@Views/common/Right";
    export default {
        name: 'Home',
        components: {
            MCarouselFade,
            MCarouselFadeItem,
            PostsList,
            VideoList,
            Right,
            ImageText
        },
        data: function () {
            return {
                carouse_config: {
                    updateCallback: function () {},
                    autoplay: true,
                    active: 0,
                    item_list: [
                        {banner: require('@Assets/images/banner01.jpg').default},
                        {banner: require('@Assets/images/banner02.jpg').default},
                        {banner: require('@Assets/images/banner03.jpg').default},
                        {banner: require('@Assets/images/banner04.jpg').default},
                    ],
                },
                weixin_img: require('@Assets/images/weixin.png').default,
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
                posts_list: [
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
                    {
                        image: require('@Assets/images/videobg.jpg').default,
                        'title': '如何建立个人博客？',
                        'username':'李煌鹏',
                        'create_date':'2014-06-05 10:24:00',
                        'type':'PHP',
                        'content': '11111111111111111111111111111111111111111111想必很多人都想建立一个，属于自己的个人博客，把自己的一些学习的经验和经历，通过互联网的形式来分享给别人。通过分享与网友进行互动，让更多的人了解和认识你，并且树立自己在互联网上的个人品牌，其实这就是一种“自媒体”。那么我们怎么去建立自己独立...'
                    },
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
                    {
                        image: require('@Assets/images/videobg.jpg').default,
                        'title': '如何建立个人博客？',
                        'username':'李煌鹏',
                        'create_date':'2014-06-05 10:24:00',
                        'type':'PHP',
                        'content': '11111111111111111111111111111111111111111111想必很多人都想建立一个，属于自己的个人博客，把自己的一些学习的经验和经历，通过互联网的形式来分享给别人。通过分享与网友进行互动，让更多的人了解和认识你，并且树立自己在互联网上的个人品牌，其实这就是一种“自媒体”。那么我们怎么去建立自己独立...'
                    },
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
                    {
                        image: require('@Assets/images/videobg.jpg').default,
                        'title': '如何建立个人博客？',
                        'username':'李煌鹏',
                        'create_date':'2014-06-05 10:24:00',
                        'type':'PHP',
                        'content': '11111111111111111111111111111111111111111111想必很多人都想建立一个，属于自己的个人博客，把自己的一些学习的经验和经历，通过互联网的形式来分享给别人。通过分享与网友进行互动，让更多的人了解和认识你，并且树立自己在互联网上的个人品牌，其实这就是一种“自媒体”。那么我们怎么去建立自己独立...'
                    },
                ],
            }
        },
        mounted: function () {

        },
        methods: {
            handleClick:function () {
                
            }
        }
    }
</script>
<style>
    .mblog-home-container {
        width: 100%;
        min-height: 400px;
    }

    .mblog-home-container .m-carousel-fade-item img {
        width: 100%;
        height: 270px;
    }
    @media only screen and (max-width: 480px){
        .mblog-home-container .m-carousel-fade-item img {
            height: auto;
        }
    }

    .mblog-home-container .mblog-home-carouse {
        position: relative;
    }

    .m-carousel-fade-point-list .m-carousel-fade-point.active {
        background-color: #409eff;
    }

    .mblog-home-container .mblog-home-carouse-point-btn .m-carousel-fade-img img {
        width: 100%;
        box-shadow: none;
    }

    .mblog-home-container .mblog-home-carouse-point-btn .m-carousel-fade-img.active img {
        box-shadow: 0 0 0 2px white;
        border-radius: 3px;
    }

    .mblog-home-container .m-carousel-fade-item img {
        margin: auto;
        display: block;
    }

    .mblog-home-container .mblog-home-carouse-point-btn .m-carousel-fade-img {
        margin: -50px 30px;
    }

    .mblog-home-container .mblog-home-carouse-point-btn .m-carousel-fade-img .m-carousel-fade-img-bg {
        background-color: transparent;
    }

    .m-carousel-fade-point-list .m-carousel-fade-img {
        height: 0;
        width: 10%;
    }

    .mblog-home-title span {
        background-color: #4b5153;
        box-shadow: 5px 3px 10px #756f71;
        color: white;
        font-size: 14px;
        border-radius: 5px;
        padding: 10px 20px;
    }

    .mblog-home-posts-title {
        margin: 10px 0 20px 0;
    }

    .mblog-home-container .mblog-home-mingpian{
        background-color: rgba(42,42,42,1);
    }
    .mblog-home-container .mblog-home-mingpian h2{
        font-size: 22px;
        color: #89919a;
        font-weight: normal;
        padding: 15px 0 25px 15px;
    }

    .mblog-home-container .mblog-home-mingpian p{
        text-align: left;
        padding-left:25px;
        height: 30px;
        line-height: 30px;
        color: #d0d2d4;
    }

    .mblog-home-container .mblog-home-mingpian ul{
        display: flex;
        width: 90%;
        justify-content: center;
        margin:auto;
    }
    .mblog-home-container .mblog-home-mingpian ul li{
        list-style:none;
        width: 25%;
        height:80px;
        line-height:80px;
        text-align:center;
        position:relative;
    }
    .mblog-home-container .mblog-home-mingpian ul li i{
        font-size: 36px;
        border-radius: 50%;
        border:1px solid #d0d2d4;
        cursor:pointer;
        padding:5px;
        box-shadow:0px 1px 0px rgba(255,255,255,.1), inset 0px 1px 1px rgba(0,0,0,.7);
    }
    .mblog-home-container .mblog-home-mingpian ul li a{
        text-decoration: none;
    }
    .mblog-home-container .mblog-home-mingpian ul li i.icon-shouye2{
        color:#ef5509;
    }
    .mblog-home-container .mblog-home-mingpian ul li i.icon-email{
        color:#FF991A;
    }
    .mblog-home-container .mblog-home-mingpian ul li i.icon-qq{
        color:#1296DB;
    }
    .mblog-home-container .mblog-home-mingpian ul li i.icon-weixin{
        color:#07AF12;
    }

    .mblog-home-container .mblog-home-mingpian ul li .el-image{
        position:absolute;
        top:0px;
        right:0px;
        width:100%;
        height:auto;
        display:none;
    }
    .mblog-home-container .mblog-home-mingpian ul li:hover .el-image{
        display: block;
    }
</style>
