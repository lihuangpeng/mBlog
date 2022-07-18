<template>
    <section class="mblog-comments-list-wrapper">
        <section class="mblog-comments-list-title">
            <span><span style="color: red">{{count}}</span>条评论</span>
        </section>
        <section v-if="count">
            <ul class="mblog-comments-list-container">
                <li v-for="(item,key) in list" :key="key">
                    <section class="mblog-comments-text-container">
                        <section class="mblog-comments-user-header">
                            <el-image :src=" item.from.header_img ? item.from.header_img : require('@Assets/images/default_header_img.jpg').default "></el-image>
                        </section>
                        <section class="mblog-comments-box">
                            <span style="color: red">{{item.from.plat_user_name}}</span>
                            <section class="mblog-comments-box-content">{{item.content}}</section>
                            <p><span>{{item.create_at}}</span></p>
                        </section>
                        <section class="mblog-comments-reply-box">
                            <ul class="mblog-comments-list-container" v-if="item.reply.length > 0">
                                <li v-for="(item,key) in item.reply" :key="key">
                                    <section class="mblog-comments-text-container">
                                        <section class="mblog-comments-user-header">
                                            <el-image :src=" item.from.header_img ? item.from.header_img : require('@Assets/images/default_header_img.jpg').default "></el-image>
                                        </section>
                                        <section class="mblog-comments-box">
                                            <span>{{item.from.plat_user_name}} <span style="color: red">回复</span> {{item.to.plat_user_name}}</span>
                                            <section class="mblog-comments-box-content">{{item.content}}</section>
                                            <p><span>{{item.create_at}}</span></p>
                                        </section>
                                    </section>
                                </li>
                            </ul>
                        </section>
                    </section>
                </li>
            </ul>
            <el-pagination
                    @current-change="handleCurrentChange"
                    :current-page="1"
                    :page-size="10"
                    :pager-count="5"
                    layout=" prev, pager, next"
                    :total="count">
            </el-pagination>
        </section>
        <section class="no-data" v-else>亲，暂时没有评论哦！赶紧来留下你的脚印吧！</section>
    </section>
</template>
<script>
    export default{
        name:"CommentsList",
        props:{
            list:Array,
            count:Number,
            type:String,
            type_id:Number
        },
        data:function () {
            return {

            }
        },
        created:function () {

        },
        methods:{
            handleCurrentChange:function () {

            }
        }

    }
</script>
<style>
    .mblog-comments-list-wrapper{
        color: #333;
    }
    .mblog-comments-list-wrapper .mblog-comments-list-title{
        line-height: 60px;
        height: 60px;
    }
    .mblog-comments-list-wrapper .mblog-comments-list-title>span {
        padding: 8px 20px;
        color: #908d8d;
        border: 1px solid #ccc;
        letter-spacing: 0.1em;
        background-color: rgba(0, 0, 0, .04);
        border-radius: 5px;
    }
    .mblog-comments-list-wrapper .no-data {
        text-align: center;
        padding: 40px 0 20px 0;
        font-size: 16px;
        color: #666;
        border-top: 1px solid #ccc;
    }
    .mblog-comments-list-wrapper .mblog-comments-list-container li{
        list-style: none;
        width: 100%;
        border-top: 1px solid #ccc;
    }
    .mblog-comments-list-wrapper .mblog-comments-list-container li .mblog-comments-user-header img{
        width: 50px;
        height: 50px;
    }
    .mblog-comments-list-wrapper .mblog-comments-list-container li .mblog-comments-text-container{
        padding: 8px 0 0 0;
    }
    .mblog-comments-list-wrapper .mblog-comments-list-container li .mblog-comments-text-container:after{
        content: '';
        clear: both;
        display: block;
    }
    .mblog-comments-list-wrapper .mblog-comments-list-container li .mblog-comments-text-container>section{
       float: left;
    }
    .mblog-comments-list-wrapper .mblog-comments-list-container li ul {
        margin-left: 50px;
    }

    .mblog-comments-list-wrapper .mblog-comments-box{
        width: 75%;
        padding-left: 10px;
        padding-bottom: 5px;
    }

    .mblog-comments-list-wrapper .mblog-comments-list-container li ul li  .mblog-comments-box{
        width:69%;
    }
    .mblog-comments-list-wrapper .mblog-comments-box p{
        height: 25px;
        line-height: 25px;
    }
    .mblog-comments-list-wrapper .mblog-comments-reply-box{
        width: 100%;
    }
    .mblog-comments-list-wrapper .mblog-comments-box .mblog-comments-box-content{
        white-space: pre-line;
    }
</style>
