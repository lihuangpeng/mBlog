<template>
    <el-upload
            class="upload-demo"
            drag
            action=""
            :multiple="multiple"
            :auto-upload="autoUpload"
            :show-file-list="showFile"
            :file-list="file_list"
            :limit="limit"
            :on-change="uploadFile">
        <section v-if="oss.status == 'stop'">
            <i class="el-icon-upload"></i>
            <div class="el-upload__text">将文件拖到此处，或<em>点击上传</em></div>
        </section>
        <section v-else-if="oss.status == 'start'" style="height: 180px;padding-top: 20px;">
            <el-progress type="circle" :percentage="oss.percent"></el-progress>
        </section>
        <section v-else-if="oss.status == 'error'" style="padding-top: 20px;width:126px;margin: auto" @click="resumeUpload()">
            <el-progress type="circle" :percentage="oss.percent" status="exception"></el-progress>
        </section>
        <section v-else>
            <input type="hidden" style="display: none" :name="filename" :value="path">
            <section v-if="type == 'image'" class="upload_preview">
                <el-image :src="path"></el-image>
            </section>

            <section v-else class="upload_preview" @click="clickCancle">
                <video-player
                        class="video-player vjs-custom-skin"
                        ref="videoPlayer"
                        :playsinline="true"
                        :options="playerOptions"
                        @timeupdate="onPlayerTimeupdate($event)">
                </video-player>
            </section>
        </section>
    </el-upload>
</template>

<script type="text/javascript">
    const OSS = require('ali-oss');
    import Ali from "@Assets/js/api/ali.js";
    import {videoPlayer} from "vue-video-player";
    import "video.js/dist/video-js.css";
    export default {
        name : 'UploadFile',
        components:{
            videoPlayer
        },
        props :{
            type:String,
            filename:String,
        },
        data:function () {
            return {
                multiple:false,
                autoUpload:false,
                showFile:false,
                file_list : [],
                path:'',
                allow_type:[],
                limit:1,
                oss:{
                    region:'oss-cn-guangzhou',
                    bucket:"",
                    client:'',
                    headers: {
                        // 指定该Object被下载时的网页缓存行为。
                        "Cache-Control": "no-cache",
                        // 指定过期时间，单位为毫秒。
                        Expires: "1000",
                        // 指定初始化分片上传时是否覆盖同名Object。此处设置为true，表示禁止覆盖同名Object。
                        "x-oss-forbid-overwrite": "false",
                    },
                    partSize : 1024 * 1024,
                    status:'stop',
                    parallel : 1,
                    check_point:0,
                    percent: 0,
                    running_times:0,
                    upload_file: '',
                },
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
            if(this.type === 'video'){
                this.oss.bucket = 'mblog-vip';
                this.allow_type = ['video/mp4']
            }else{
                this.oss.bucket='mblogbucket-guangzhou';
                this.allow_type = ['image/png','image/jpg','image/jpeg','image/gif']
            }
        },
        methods:{
            //检测上传文件
            beforeUpload:function (file,callback) {
                if(this.allow_type.indexOf(file.raw.type) < 0){
                    this.$message.error('文件类型不允许');
                    this.file_list = [];
                    return false;
                }
                let accessKeyId = this.$cookie.getCookie('accessKeyId');
                let accessKeySecret = this.$cookie.getCookie('accessKeySecret');
                let stsToken = this.$cookie.getCookie('stsToken');
                if(accessKeyId && accessKeySecret && stsToken){
                    this.initClient(accessKeyId,accessKeySecret,stsToken);
                    callback(file);
                }else{
                    Ali.getAssumeRole().then((data)=>{
                        if(data.code == 200){
                            this.$cookie.setCookie('accessKeyId',data.data.AccessKeyId,30 * 60);
                            this.$cookie.setCookie('accessKeySecret',data.data.AccessKeySecret,30 * 60);
                            this.$cookie.setCookie('stsToken',data.data.SecurityToken,30 * 60);
                            this.initClient(data.data.AccessKeyId,data.data.AccessKeySecret,data.data.SecurityToken);
                            callback(file);
                        }else{
                            this.file_list = [];
                            this.$message.error(data.msg);
                        }
                    }).catch( (error)=>{
                        this.file_list = [];
                        this.$message.error('网络异常')
                    });
                }
            },
            initClient:function (accessKeyId,accessKeySecret,stsToken) {
                if(!this.oss.client){
                    this.oss.client =  new OSS({
                        region: this.oss.region,
                        // 从STS服务获取的临时访问密钥（AccessKey ID和AccessKey Secret）。
                        accessKeyId: accessKeyId,
                        accessKeySecret: accessKeySecret,
                        // 从STS服务获取的安全令牌（SecurityToken）。
                        stsToken: stsToken,
                        // 填写Bucket名称，例如examplebucket。
                        bucket: this.oss.bucket,
                        Format:'json'
                    });
                }
            },
            uploadFile:function (file,filelist) {
                this.beforeUpload(file,(file)=>{
                    let month = (new Date()).getMonth() + 1;
                    let day = (new Date()).getDate();
                    if(month < 10) month = "0"+month;
                    if(day < 10) day = "0"+day;
                    let date = (new Date()).getFullYear()+'-'+month+'-'+day;
                    const name = date+'/'+file.name;
                    if(file.size > this.oss.partSize){
                        this.oss.parallel = Math.ceil(file.size / this.oss.partSize);
                    }
                    this.oss.running_times = 1;
                    this.oss.status = 'start';
                    this.oss.client.multipartUpload(name, file.raw, {
                        progress : (p, _checkpoint)=>{
                            // Object的上传进度。
                            this.oss.percent = p * 100;
                            // 分片上传的断点信息。
                            this.oss.check_point = _checkpoint;
                        },
                        headers:this.oss.headers,
                        // 设置并发上传的分片数量。
                        parallel: this.oss.parallel,
                        // 设置分片大小。默认值为1 MB，最小值为100 KB。
                        partSize: this.oss.partSize,
                    }).then((data)=>{
                        this.file_list=[];
                        if(data.res.status == 200){
                            this.oss.status = 'success';
                            if(this.type == 'image'){
                                if(data.res.requestUrls[0].indexOf('?') < 0){
                                    this.path = data.res.requestUrls[0]
                                }else{
                                    this.path = data.res.requestUrls[0].substring(0,data.res.requestUrls[0].indexOf('?'));
                                }
                            }else {
                                this.videoPreview(data.name);
                            }
                        }
                    }).catch((e)=>{
                        this.file_list=[];
                        this.oss.status = 'error';
                        this.$message.error('上传失败，网络异常,点击进度条可重试');
                    });
                });
            },
            //重新上传
            resumeUpload:function () {
                if(this.oss.check_point){
                    this.oss.running_times++;
                    this.oss.status = 'start';
                    this.oss.client.multipartUpload(name, this.oss.check_point.file, {
                        progress : (p, _checkpoint)=>{
                            // Object的上传进度。
                            this.oss.percent = p * 100;
                            // 分片上传的断点信息。
                            this.oss.check_point = _checkpoint;
                        },
                        checkpoint: this.oss.check_point,
                        headers:this.oss.headers,
                        // 设置并发上传的分片数量。
                        parallel: this.oss.parallel,
                        // 设置分片大小。默认值为1 MB，最小值为100 KB。
                        partSize: this.oss.partSize,
                    }).then((data)=>{
                        this.file_list=[];
                        if(data.res.status == 200){
                            this.oss.status = 'success';
                            if(this.type == 'image'){
                                if(data.res.requestUrls[0].indexOf('?') < 0){
                                    this.path = data.res.requestUrls[0]
                                }else{
                                    this.path = data.res.requestUrls[0].substring(0,data.res.requestUrls[0].indexOf('?'));
                                }
                            }else {
                                console.log(data.name);
                                this.videoPreview(data.name);
                            }
                        }
                    }).catch((e)=>{
                        this.file_list=[];
                        this.oss.status = 'error';
                        this.$message.error('上传失败，网络异常,点击进度条可重试');
                    });
                }
                this.clickCancle();
            },
            clickCancle:function () {
                let event = window.event;
                event.stopPropagation();
                event.cancleBubble = true;
                return false;
            },
            videoPreview:function (path) {
                this.path = path;
                Ali.preview(path).then((data)=>{
                    this.playerOptions.sources.push({
                        src: data.data,  // 路径
                        type: 'video/mp4'  // 类型
                    });
                }).catch((error)=>{
                    console.log(error);
                });
            },
            /*
             其实多数是列出的一些回调函数而已，不需要使用的话忽略掉即可
             */
            // 当前播放位置发生变化时触发。
            onPlayerTimeupdate:function(player) {
                console.log("Player Timeupdate",player);
            },
        }
    }
</script>

<style>
    .upload_preview .el-image img{
        height: 180px;
        width: auto;
    }

    .upload_preview  .video-js.vjs-fluid, .video-js.vjs-16-9, .video-js.vjs-4-3{
        width: 90%;
        margin:auto;
    }
    .upload_preview .video-js.vjs-fluid{
        padding-top: 47.25% ;
    }
    .upload_preview  .video-js .vjs-big-play-button{
        border-radius: 50%;
        margin: auto;
        height:56px;
        line-height:56px;
        width:56px;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
    }
</style>