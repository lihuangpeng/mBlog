<template>
    <section class="mblog-about-wrapper">
        <el-card  style="margin-top: 10px;">
            <div class="text">
                <h2 class="mblog-about-title">关于我</h2>
                <section class="mblog-about-container">
                    <el-image :src="require('@Assets/images/my-header.jpg').default"></el-image>
                    <h2>
                        李煌鹏
                    </h2>
                    <p>
                        一个90后小程序员！PHP/GO/半前端开发工程师，喜欢发呆，打游戏。
                    </p>
                    <p>欢迎您，来到我的技术分享网站，各位看客相聚即是有缘，不喜勿喷。</p>
                    <h2 class="mblog-about-c-title">内心独白</h2>
                    <p>
                        我叫李煌鹏，一个90后小程序员，2019年入行。为什么会想到做一个博客呢？在入行一段时间内有过一段迷茫期，觉得自己没有刚入行时的那种对于知识的渴望和追求，我喜欢自己完成一个产品时的成就感，以及学会一个新知识的满足感
                        在这个博客完成之前，是以纯文件的方式记录知识，极其不方便，所以想着做一个博客，用于方便将自己学习生活记录下来。在这里不得不说一下我最喜欢的一句话“夫旧而能守，斯亦已矣！然鄙人以为人之处于世也，如逆水行舟，不进则退”，各位打工人，一起共同进步吧。
                    </p>
                </section>
            </div>
        </el-card>
    </section>
</template>

<script>

    export default{
        name: 'About',
        components: {},
        data: function () {
            return {

            }
        }
    }
</script>
<style>
    .mblog-about-wrapper{
        margin-bottom: 20px;
        min-height: 430px;
    }
    .mblog-about-wrapper  .mblog-about-title{
        font-size: 18px;
        line-height: 40px;
        border-bottom: 1px solid #eee;
        color: #484848;
        font-weight: normal;
        position: relative;
        margin-bottom: 10px;
    }
    .mblog-about-wrapper  .mblog-about-title:after{
        content: "";
        position: absolute;
        width: 60px;
        height: 2px;
        /* content: ""; */
        background: #000;
        left: 0;
        bottom: 0;
        -moz-transition: all .5s ease;
        -webkit-transition: all .5s ease;
        transition: all .5s ease;
    }

    .mblog-about-wrapper .el-image{
        width: 20%;
        float: left;
        margin: 10px 10px 10px 0;
    }
    @media screen and (max-width: 468px){
        .mblog-about-wrapper .el-image{
            width: 30%;
        }
    }
    .mblog-about-wrapper .el-image img{
        width: 100%;
        height: 100%;
    }
    .mblog-about-wrapper .mblog-about-container h2{
        padding: 10px 0 ;
        font-size: 18px;
    }

    .mblog-about-wrapper .mblog-about-container p{
        font-size: 16px;
        padding-bottom: 10px;
    }
    .mblog-about-wrapper .mblog-about-container .mblog-about-c-title{
        border-bottom: 1px solid #eee;
        font-size: 18px;
        margin-bottom: 10px;
    }

</style>