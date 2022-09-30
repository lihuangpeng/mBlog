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
                        <h2 class="mblog-video-title" v-html="video.title"></h2>
                        <section  class="mblog-video-info">
                            <ul>
                                <li>编辑时间：{{video.update_at}}</li>
                                <li>浏览量：<span>{{video.watch_num}}</span></li>
                                <li>作者：<span>{{video.author}}</span></li>
                            </ul>
                        </section>
                        <video-player
                                class="video-player vjs-custom-skin"
                                ref="videoPlayer"
                                :playsinline="true"
                                :options="playerOptions"
                                @play="onPlayerPlay($event)"
                                @pause="onPlayerPause($event)"
                                @ended="onPlayerEnded($event)"
                                @waiting="onPlayerWaiting($event)"
                                @playing="onPlayerPlaying($event)"
                                @loadeddata="onPlayerLoadeddata($event)"
                                @timeupdate="onPlayerTimeupdate($event)"
                                @canplay="onPlayerCanplay($event)"
                                @canplaythrough="onPlayerCanplaythrough($event)"
                                @statechanged="playerStateChanged($event)"
                                @ready="playerReadied">
                        </video-player>
                        <section class="mblog-video-content">
                            <el-tabs v-model="activeName" @tab-click="handleClick">
                                <el-tab-pane label="视频简介" name="video_desc" class="mblog-video-desc" v-html="video.desc"></el-tab-pane>
                                <el-tab-pane label="视频笔记" name="video_content" v-html="video.content" class="markdown-body"></el-tab-pane>
                            </el-tabs>
                        </section>
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
    import {videoPlayer} from "vue-video-player";
    import "video.js/dist/video-js.css";
    export default{
        name:"ShowPosts",
        components:{
            Right,
            CommentsList,
            PutComments,
            videoPlayer
        },
        data:function () {
            return {
                video:{
                    id:0,
                    content:'',
                    title:'',
                    desc:'',
                    update_at:'',
                    watch_num:100,
                    author: ''
                },
                activeName:'video_content',
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

                ],
                playerOptions : {
                    playbackRates: [0.7, 1.0, 1.5, 2.0], // 播放速度
                    autoplay: false, // 如果true,浏览器准备好时开始回放。
                    muted: false, // 默认情况下将会消除任何音频。
                    loop: false, // 导致视频一结束就重新开始。
                    preload: 'auto', // 建议浏览器在<video>加载元素后是否应该开始下载视频数据。auto浏览器选择最佳行为,立即开始加载视频（如果浏览器支持）
                    language: 'zh-CN',
                    aspectRatio: '16:9', // 将播放器置于流畅模式，并在计算播放器的动态大小时使用该值。值应该代表一个比例 - 用冒号分隔的两个数字（例如"16:9"或"4:3"）
                    fluid: true, // 当 true 时，Video.js player 将拥有流体大小。换句话说，它将按比例缩放以适应其容器。
                    sources: [],
                    poster: "", // 封面地址
                    notSupportedMessage: '此视频暂无法播放，请稍后再试', // 允许覆盖 Video.js 无法播放媒体源时显示的默认信息。
                    controlBar: {
                        timeDivider: true, // 时间分割线
                        durationDisplay: true, // 总时间
                        remainingTimeDisplay: true, // 剩余播放时间
                        progressControl: true, // 进度条
                        fullscreenToggle: true  // 全屏按钮
                    }
                }
            }
        },
        created:function () {
            let id = this.$route.params.id;
            this.video.id = id.split('.')[0];
            this.playerOptions.sources.push({
                src: 'https://mblogbucket-guangzhou.oss-cn-guangzhou.aliyuncs.com/video/'+this.video.id+'.mp4',  // 路径
                type: 'video/mp4'  // 类型
            })
        },
        mounted:function () {
            if(document.getElementById('mblog-video-show-wrapper')){
                let content = document.getElementById('mblog-video-show-wrapper').querySelector('.mblog-video-show-content').innerHTML;
                this.video.content = marked(content);
                this.video.title = document.getElementById('mblog-video-show-wrapper').querySelector('.mblog-video-show-title').innerHTML;
                this.video.update_at = document.getElementById('mblog-video-show-wrapper').querySelector('.mblog-video-show-update_at').innerHTML;
                this.video.author = document.getElementById('mblog-video-show-wrapper').querySelector('.mblog-video-show-author').innerHTML;
                this.video.desc = document.getElementById('mblog-video-show-wrapper').querySelector('.mblog-video-show-desc').innerHTML;
                document.getElementById('mblog-video-show-wrapper').remove();
                setTimeout(()=>{
                    this.loading = false;
                },100);
            }
        },
        methods:{
            /*
             其实多数是列出的一些回调函数而已，不需要使用的话忽略掉即可
             */
            // 播放回调
            onPlayerPlay:function(player) {
                console.log("player play!", player);
            },
            // 暂停回调
            onPlayerPause:function(player) {
                console.log("player pause!", player);
            },
            // 视频播完回调
            onPlayerEnded:function(player) {
                console.log("player end!", player);
            },
            // DOM元素上的readyState更改导致播放停止
            onPlayerWaiting:function(player) {
                console.log("Player Waiting",player);
            },
            // 已开始播放回调
            onPlayerPlaying:function(player) {
                console.log("Player Playing",player);
            },
            // 当播放器在当前播放位置下载数据时触发
            onPlayerLoadeddata:function(player) {
                console.log("Player Loadeddata",player);
            },
            // 当前播放位置发生变化时触发。
            onPlayerTimeupdate:function(player) {
                console.log("Player Timeupdate",player);
            },
            // 媒体的readyState为HAVE_FUTURE_DATA或更高
            onPlayerCanplay:function(player) {
                console.log('player Canplay!', player)
            },
            // 媒体的readyState为HAVE_ENOUGH_DATA或更高。这意味着可以在不缓冲的情况下播放整个媒体文件。
            onPlayerCanplaythrough:function(player) {
                console.log('player Canplaythrough!', player)
            },
            //播放状态改变回调
            playerStateChanged:function(playerCurrentState) {
                console.log("player current update state", playerCurrentState);
            },
            //将侦听器绑定到组件的就绪状态。与事件监听器的不同之处在于，如果ready事件已经发生，它将立即触发该函数。。
            playerReadied:function(player) {
                console.log("example player 1 readied", player);
            },
        }
    }
</script>
<style src='@Assets/css/github-markdown.min.css'></style>
<style>
    .mblog-video-title{
        text-align: center;
        font-size: 22px;
        font-weight: 500;
        color: #0088db;
        padding: 10px 0;
    }
    .mblog-video-info{
        border-top: 1px dashed #ccc;
        border-bottom: 1px dashed #ccc;
        margin-bottom: 15px;
        margin-top: 10px;
    }
    .mblog-video-info ul {
        width: 90%;
        margin: auto;
        list-style: none;
        display: flex;
    }
    .mblog-video-info ul li{
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
    .mblog-video-info ul li span{
        color: red;
        font-size: 15px;
    }

    .mblog-video-content{
        margin-top:20px;
    }
    .mblog-video-content .el-tabs__item{
        width: 50%;
        text-align: center;
        height:60px;
        line-height:60px;
        font-size:16px;
    }
    .mblog-video-content  .el-tabs__nav{
        width: 100%;
        border-top: 1px solid #ccc;
    }

    .mblog-video-content .mblog-video-desc{
        font-size: 16px;
    }

    .video-js .vjs-big-play-button{
        border-width: 3px;
        border-color: rgb(255, 255, 255);
        border-style: solid;
        border-radius: 50%;
        width: 56px;
        height: 56px;
        line-height: 50px;
        background-color: rgba(0,0,0,0);
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
    }
</style>