<template>
    <section class="mblog-posts-list-wrapper">
        <el-row :gutter="15" style="margin-bottom: 10px;">
            <el-col v-for="(item,key) in list" :key="key">
                <el-card>
                    <el-image :src="item.image" lazy class="image"></el-image>
                    <div class="mblog-home-posts-container" @click="showPosts()">
                        <h3>{{item.title}}</h3>
                        <div>
                            <span>作者：{{item.username}}</span>
                            <span>发布时间：{{item.create_date}}</span>
                            <span>分类：{{item.type}}</span>
                        </div>
                        <EllipsisText :height="60" class="hidden-xs-only">{{item.content}}</EllipsisText>
                        <EllipsisText :height="40" class="hidden-sm-and-up">{{item.content}}</EllipsisText>
                    </div>
                </el-card>
            </el-col>
        </el-row>
    </section>
</template>
<script>
    import EllipsisText from "@Components/EllipsisText.vue"
    export default{
        name:"PostsList",
        components:{
            EllipsisText
        },
        props:{
            list:Array,
        },
        methods:{
            showPosts:function () {
                window.location.href='/views/posts/1.html';
            }
        }
    }
</script>
<style>
    .mblog-posts-list-wrapper .el-card__body{
        width: 100%;
        padding: 0;
        display: flex;
    }
    .mblog-posts-list-wrapper .image{
        width: 30%;
        padding: 20px 10px;
    }
    .mblog-posts-list-wrapper .el-card{
        cursor: pointer;
        position: relative;
        margin-bottom: 10px;
    }
    .mblog-posts-list-wrapper .el-card:hover{
        box-shadow: 0 0 10px #0000ff;
    }
    .mblog-posts-list-wrapper .mblog-home-posts-container{
        position: relative;
        width: 70%;
        padding:10px 0;
        left: 0;
    }
    .mblog-posts-list-wrapper .mblog-home-posts-container h3{
        font-size: 1pc;
        padding: 10px 10px;
        color:#3d3d3d;
    }
    .mblog-posts-list-wrapper .mblog-home-posts-container>div{
        padding: 0px 10px 10px 10px;
        color: #919898;
    }
    .mblog-posts-list-wrapper .mblog-home-posts-container>div span{
        margin-right: 5px;
    }
</style>