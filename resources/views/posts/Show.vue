<template>
    <el-row :gutter="15" style="margin-bottom: 15px;">
        <el-skeleton :loading="loading" animated>
            <template slot="template">
                <el-col :sm="18">
                    <el-card>
                        <el-skeleton :rows="16" animated />
                    </el-card>
                </el-col>
                <el-col :sm="6" class="hidden-xs-only">
                    <el-card>
                        <el-skeleton :rows="16" animated />
                    </el-card>
                </el-col>
            </template>
            <template>
                <el-col :sm="18">
                    <el-card>
                        <h2 class="mblog-posts-title" v-html="posts.title"></h2>
                        <section  class="mblog-posts-info">
                            <ul>
                                <li>编辑时间：{{posts.update_at}}</li>
                                <li>浏览量：<span>{{posts.watch_num}}</span></li>
                                <li>作者：<span>{{posts.author}}</span></li>
                            </ul>
                        </section>
                        <section class="markdown-body" v-html="posts.content"></section>
                    </el-card>
                    <el-card style="margin-top: 15px;">
                        <PutComments></PutComments>
                        <CommentsList :count="100" :list="comments_list"></CommentsList>
                    </el-card>
                </el-col>
                <el-col :sm="6" class="hidden-xs-only">
                    <Right></Right>
                </el-col>
            </template>
        </el-skeleton>
    </el-row>

</template>
<script>
    import {marked} from "marked";
    import Right from "@Views/common/Right.vue";
    import CommentsList from "@Components/CommentsList.vue";
    import PutComments from "@Components/PutComments.vue";
    export default{
        name:"ShowPosts",
        components:{
            Right,
            CommentsList,
            PutComments
        },
        data:function () {
            return {
                posts:{
                    content:'',
                    title:'',
                    update_at:'2022-07-16 10:12:00',
                    watch_num:100,
                    author: '放下就是快乐'
                },
                loading:true,
                comments_list:[
                    {
                        'id' : 1,
                        'from' : {
                            'uid' : 'ah000002',
                            'plat_user_name' : '李煌鹏2',
                            'header_img' : '',
                        },
                        'content' : '大家好，你是谁，我是谁发发发过啦国家拉进来大家好，你是谁，我是谁发发发过啦国家拉进来你是谁，我是谁发发发过啦国家拉进来你是谁，我是谁发发发过啦国家拉进来你是谁，我是谁发发发过啦国家拉进来',
                        'create_at' : '2022-08-19 10:00:00',
                        'is_del' : '0',
                        'uid' : 'ah000002',
                        'likes' : 3,
                        'reply' : [
                            {
                                'from' : {
                                    'uid' : 'ah000001',
                                    'plat_user_name' : '李煌鹏1'
                                },
                                'to' : {
                                    'uid' : 'ah000002',
                                    'plat_user_name' : '李煌鹏2'
                                },
                                'uid' : 'ah000001',
                                'content' : '你好啊,李煌鹏2',
                                'create_at' : '2022-08-19 10:00:00',
                                'is_del' : '0',
                                'likes' : 3,
                                'id' : 2
                            },
                            {
                                'from' : {
                                    'uid' : 'ah000003',
                                    'plat_user_name' : '李煌鹏3'
                                },
                                'to' : {
                                    'uid' : 'ah000001',
                                    'plat_user_name' : '李煌鹏1'
                                },
                                'uid' : 'ah000003',
                                'content' : '你好啊,李煌鹏1',
                                'create_at' : '2022-08-19 10:00:00',
                                'likes' : 3,
                                'is_del' : '0',
                                'id' : 3
                            }
                        ]
                    },
                    {
                        'id' : 4,
                        'from' : {
                            'uid' : 'ah000004',
                            'plat_user_name' : '李煌鹏4',
                            'header_img' : ''
                        },
                        'likes' : 3,
                        'content' : '大家好',
                        'create_at' : '2022-08-19 10:00:00',
                        'is_del' : '0',
                        'uid' : 'ah000004',
                        'reply' : []
                    },
                    {
                        'id' : 5,
                        'from' : {
                            'uid' : 'ah000005',
                            'plat_user_name' : '李煌鹏5',
                            'header_img' : ''
                        },
                        'likes' : 3,
                        'content' : '大家好',
                        'create_at' : '2022-08-19 10:00:00',
                        'is_del' : '0',
                        'uid' : 'ah000005',
                        'reply' : []
                    },
                    {
                        'id' : 6,
                        'from' : {
                            'uid' : 'ah000006',
                            'plat_user_name' : '李煌鹏6',
                            'header_img' : ''
                        },
                        'likes' : 3,
                        'content' : '大家好',
                        'create_at' : '2022-08-19 10:00:00',
                        'is_del' : '0',
                        'uid' : 'ah000006',
                        'reply' : []
                    },
                    {
                        'id' : 7,
                        'from' : {
                            'uid' : 'ah000007',
                            'plat_user_name' : '李煌鹏7',
                            'header_img' : ''
                        },
                        'likes' : 3,
                        'content' : '大家好',
                        'create_at' : '2022-08-19 10:00:00',
                        'is_del' : '0',
                        'uid' : 'ah000007',
                        'reply' : []
                    },
                    {
                        'id' : 8,
                        'from' : {
                            'uid' : 'ah000008',
                            'plat_user_name' : '李煌鹏8',
                            'header_img' : ''
                        },
                        'likes' : 3,
                        'content' : '大家好',
                        'create_at' : '2022-08-19 10:00:00',
                        'is_del' : '0',
                        'uid' : 'ah000008',
                        'reply' : []
                    },
                    {
                        'id' : 9,
                        'from' : {
                            'uid' : 'ah000009',
                            'plat_user_name' : '李煌鹏9',
                            'header_img' : ''
                        },
                        'likes' : 3,
                        'content' : '大家好',
                        'create_at' : '2022-08-19 10:00:00',
                        'is_del' : '0',
                        'uid' : 'ah000009',
                        'reply' : []
                    },
                    {
                        'id' : 10,
                        'from' : {
                            'uid' : 'ah000010',
                            'plat_user_name' : '李煌鹏10',
                            'header_img' : ''
                        },
                        'likes' : 3,
                        'content' : '大家好',
                        'create_at' : '2022-08-19 10:00:00',
                        'is_del' : '0',
                        'uid' : 'ah000010',
                        'reply' : []
                    }

                ]
            }
        },
        mounted:function () {
            if(document.getElementById('mblog-posts-show-wrapper')){
                let content = document.getElementById('mblog-posts-show-wrapper').querySelector('.mblog-posts-show-content').innerHTML;
                this.posts.content = marked(content);
                this.posts.title = document.getElementById('mblog-posts-show-wrapper').querySelector('.mblog-posts-show-title').innerHTML;
                this.posts.update_at = document.getElementById('mblog-posts-show-wrapper').querySelector('.mblog-posts-show-update_at').innerHTML;
                this.posts.author = document.getElementById('mblog-posts-show-wrapper').querySelector('.mblog-posts-show-author').innerHTML;
                document.getElementById('mblog-posts-show-wrapper').remove();
                setTimeout(()=>{
                    this.loading = false;
                },100);
            }
        }
    }
</script>
<style src='@Assets/css/github-markdown.min.css'></style>
<style scoped>
    .mblog-posts-title{
        text-align: center;
        font-size: 22px;
        font-weight: 500;
        color: #0088db;
        padding: 10px 0;
    }
    .mblog-posts-info{
        border-top: 1px dashed #ccc;
        border-bottom: 1px dashed #ccc;
        margin-bottom: 15px;
        margin-top: 10px;
    }
    .mblog-posts-info ul {
        width: 90%;
        margin: auto;
        list-style: none;
        display: flex;
    }
    .mblog-posts-info ul li{
        display: inline-block;
        color: #ac5a24;
        height: 40px;
        font-size: 15px;
        line-height: 40px;
        width: 33.3%;
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
        text-align: center;
    }
    .mblog-posts-info ul li span{
        color: red;
        font-size: 15px;
    }
</style>