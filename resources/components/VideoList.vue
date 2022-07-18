<template>
    <section class="mblog-video-list-wrapper">
        <el-row :gutter="15" style="margin-bottom: 10px;">
            <el-col v-for="(item,key) in list" :key="key" :sm="24/line_count" :xs="12">
                <el-card>
                    <section @click="showVideo()">
                        <el-image :src="item.image" lazy></el-image>
                        <h4>{{item.title}}</h4>
                        <EllipsisText>{{item.content}}</EllipsisText>
                    </section>
                </el-card>
            </el-col>
        </el-row>
    </section>
</template>
<script>
    import EllipsisText from "@Components/EllipsisText.vue"
    export default{
        name:"VideoList",
        components:{
            EllipsisText
        },
        props:{
            list:Array,
            line_count:Number,
        },
        methods:{
            showVideo:function () {
                window.location.href='/views/video/1.html';
            }
        }
    }
</script>
<style>
    .mblog-video-list-wrapper .el-card{
        margin-bottom: 10px;
        transition: transform 0.3s ease;
        cursor: pointer;
    }
    .mblog-video-list-wrapper .el-card__body{
        padding: 0;
    }
    .mblog-video-list-wrapper h4{
        text-align: center;
    }
    .mblog-video-list-wrapper .el-col{
        cursor: pointer;
    }
    .mblog-video-list-wrapper .el-card:hover{
        transform: scale(1.03, 1.03);
        box-shadow: 0 0 10px #0000ff;
    }
    .mblog-video-list-wrapper img{
        width: 100%;
        height: 100%;
    }
</style>