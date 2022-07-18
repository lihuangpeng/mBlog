<template>
    <section class="mblog-guestbooks-wrapper">
        <el-row :gutter="15">
            <el-col :sm="18">
                <el-card>
                    <h2 class="mblog-guestbooks-title">留言板</h2>
                    <section style="min-height: 700px;">
                        <PutComments></PutComments>
                        <CommentsList :count="100" :list="comments_list"></CommentsList>
                    </section>
                </el-card>
            </el-col>
            <el-col :sm="6" class="hidden-xs-only">
                <Right></Right>
            </el-col>
        </el-row>
    </section>
</template>

<script>
    import PutComments from "@Components/PutComments.vue";
    import CommentsList from "@Components/CommentsList.vue";
    import Right from "@Views/common/Right.vue";
    export default {
        name:"GuestBooks",
        components:{
            Right,
            PutComments,
            CommentsList
        },
        data:function () {
            return{
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
        }
    }
</script>
<style>
    .mblog-guestbooks-wrapper{
        margin-bottom: 10px;
    }
    .mblog-guestbooks-wrapper  .mblog-guestbooks-title{
        font-size: 18px;
        line-height: 40px;
        border-bottom: 1px solid #eee;
        color: #484848;
        font-weight: normal;
        position: relative;
        margin-bottom: 10px;
    }
    .mblog-guestbooks-wrapper  .mblog-guestbooks-title:after{
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
</style>