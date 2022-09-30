<template>
    <section class="mblog-right-wrapper">
        <el-card class="mblog-right-new-wrapper ">
            <div class="text">
                <h2 class="mblog-right-title">最新更新</h2>
                <ul>
                    <li :key="key" v-for="(item,key) in newList">
                        {{item.title}}
                    </li>
                </ul>
            </div>
        </el-card>
        <el-card  style="margin-top: 10px;" class="mblog-right-click-data">
            <div class="text">
                <h2 class="mblog-right-title">点击排行</h2>
                <ImageText :src="require('@Assets/images/click_bg.jpg').default" text="作为一个佛系青年，到底好不好" height="135"></ImageText>
                <ul>
                    <li v-for="(item,key) in clickList" :key="key">
                        {{item.title}}
                    </li>
                </ul>
            </div>
        </el-card>
        <el-card style="margin-top: 10px;" class="mblog-right-biaoqian-wrapper ">
            <div class="text">
                <h2 class="mblog-right-title">标签云</h2>
                <ul>
                    <li :key="key" v-for="(item,key) in biaoQianList">
                        {{item.name}}({{item.num}})
                    </li>
                </ul>
            </div>
        </el-card>
        <el-card  style="margin-top: 10px;" class="mblog-right-s-data">
            <div class="text">
                <h2 class="mblog-right-title">站点信息</h2>
                <ul>
                    <li>
                        <span>建站时间</span>：2022-07-10
                    </li>
                    <li>
                        <span>文章：</span>14篇
                    </li>
                    <li>
                        <span>视频：</span>14个
                    </li>
                    <li>
                        <span>分类</span>：14个
                    </li>
                    <li>
                        <span>评论</span>：144条
                    </li>
                    <li>
                        <span>标签</span>：47条
                    </li>
                    <li>
                        <span>微信公众号</span>：
                        <el-image :src="require('@Assets/images/qrcode_for_gh.jpg').default"></el-image>
                    </li>
                </ul>
            </div>
        </el-card>
    </section>
</template>
<script>
    import ImageText from "@Components/ImageText"
    export default{
        'name' : 'Right',
        components:{
            ImageText
        },
        data:function () {
            return {
                newList:[
                    {'title':'作为一个设计师,如果遭到质疑你是否能恪守自己的原则?'},
                    {'title':'作为一个设计师,如果遭到质疑你是否能恪守自己的原则?'},
                    {'title':'作为一个设计师,如果遭到质疑你是否能恪守自己的原则?'},
                    {'title':'作为一个设计师,如果遭到质疑你是否能恪守自己的原则?'},
                ],
                clickList:[
                    {'title':'作为一个程序员,如果遭到质疑你是否能恪守自己的原则?'},
                    {'title':'搭建一个Swoole框架'},
                    {'title':'  如何建立个人博客？'},
                    {'title':'作为一个设计师,如果遭到质疑你是否能恪守自己的原则?'},
                    {'title':'作为一个程序员,如果遭到质疑你是否能恪守自己的原则?'},
                    {'title':'搭建一个Swoole框架'},
                    {'title':'  如何建立个人博客？'},
                    {'title':'作为一个设计师,如果遭到质疑你是否能恪守自己的原则?'},
                ],
                biaoQianList:[
                    {'name':'PHP基础','num':"1"},
                    {'name':'Swoole','num':"1"},
                    {'name':'Laravel','num':"1"},
                    {'name':'ThinkPHP','num':"1"},
                    {'name':'MySql','num':"1"},
                    {'name':'Rabbitmq','num':"1"},
                    {'name':'Redis','num':"1"},
                    {'name':'Memcached','num':"1"},
                    {'name':'Nginx','num':"1"},
                    {'name':'Apache','num':"1"},
                    {'name':'Liunx基础','num':"1"},
                    {'name':'Shell','num':"1"},
                    {'name':'Git','num':"1"},
                    {'name':'Svn','num':"1"},
                    {'name':'Vue','num':"1"},
                    {'name':'JavaScript','num':"1"},
                    {'name':'Jquery','num':"1"},
                    {'name':'Html/Css','num':"1"},
                    {'name':'小程序','num':"1"},
                    {'name':'其他','num':"1"},
                ]
            }
        },
        mounted:function () {

        }
    }
</script>
<style>
    .mblog-right-wrapper{
        margin-bottom: 10px;
        position: relative;
    }
    .mblog-right-wrapper .mblog-right-title{
        font-size: 16px;
        line-height: 40px;
        border-bottom: 1px solid #eee;
        color: #484848;
        font-weight: normal;
        position: relative;
        margin-bottom: 10px;
    }
    .mblog-right-wrapper .mblog-right-title:after{
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

    /**
    最近更新
     */
    .mblog-right-wrapper .mblog-right-new-wrapper ul{
        margin-top:30px;
    }
    .mblog-right-wrapper .mblog-right-new-wrapper ul li:before{
        content:"";
        position:absolute;
        width:3px;
        height:3px;
        border-radius:10px;
        background-color: #000;
        top: 16px;
        left: 15px;
    }
    .mblog-right-wrapper .mblog-right-new-wrapper ul li{
        cursor:pointer;
        font-size: 12px;
        line-height: 30px;
        margin-bottom: 12px;
        display: block;
        -moz-border-radius: 4px;
        border-radius: 4px;
        background: #f6f6f6;
        padding: 4px 12px 4px 30px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        position: relative;
        -moz-transition: all .2s ease;
        -webkit-transition: all .2s ease;
        transition: all .2s ease;
    }

    .mblog-right-wrapper .mblog-right-new-wrapper ul li:hover{
        background-color:#f2f2f2;
        box-shadow: 0 0 10px #ccc;
        transtion:all ease 0.2s;
    }

    /**
    点击排行
    */

    .mblog-right-wrapper .mblog-right-click-data .mblog-image-text{
        margin-bottom: 20px;
    }
    .mblog-right-wrapper .mblog-right-click-data ul li{
        cursor:pointer;
        list-style: none;
        padding-left:5px;
        overflow:hidden;
        height: 30px;
        line-height: 30px;
        margin-bottom: 10px;
        text-overflow:ellipsis;
        white-space: nowrap;
    }

    .mblog-right-wrapper .mblog-right-click-data ul li:before{
        color:white;
        padding:0 10px;
        text-align: center;
        background-color: #FF6600;
    }
    .mblog-right-wrapper .mblog-right-click-data ul li:nth-child(1):before{
        content: "1";
    }
    .mblog-right-wrapper .mblog-right-click-data ul li:nth-child(2):before{
        content: "2";
    }
    .mblog-right-wrapper .mblog-right-click-data ul li:nth-child(3):before{
        content: "3";
    }
    .mblog-right-wrapper .mblog-right-click-data ul li:nth-child(4):before{
        content: "4";
        background-color: #B1B1B1;
    }
    .mblog-right-wrapper .mblog-right-click-data ul li:nth-child(5):before{
        content: "5";
        background-color: #B1B1B1;
    }
    .mblog-right-wrapper .mblog-right-click-data ul li:nth-child(6):before{
        content: "6";
        background-color: #B1B1B1;
    }
    .mblog-right-wrapper .mblog-right-click-data ul li:nth-child(7):before{
        content: "7";
        background-color: #B1B1B1;
    }
    .mblog-right-wrapper .mblog-right-click-data ul li:nth-child(8):before{
        content: "8";
        background-color: #B1B1B1;
    }


    /**
    标签云
     */
    .mblog-right-biaoqian-wrapper ul{
        height:auto;
    }
    .mblog-right-biaoqian-wrapper ul{
        padding: 0 10px;
    }
    .mblog-right-biaoqian-wrapper ul li{
        line-height: 24px;
        height: 24px;
        display: inline-block;
        background: #999;
        padding: 3px 10px;
        margin: 10px 5px 0 0;
        border-radius: 3px;
        -moz-transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -o-transition: all 0.5s;
        transition: all 0.5s;
        color: #FFF;
        cursor:pointer;
    }
    .mblog-right-biaoqian-wrapper ul li:nth-child(8n-7){
        background-color: #8A9B0F;
    }
    .mblog-right-biaoqian-wrapper ul li:nth-child(8n-6){
        background-color: #EB6841;
    }
    .mblog-right-biaoqian-wrapper ul li:nth-child(8n-5){
        background-color: #F8A90E;
    }
    .mblog-right-biaoqian-wrapper ul li:nth-child(8n-4){
        background-color: #454d55;
    }
    .mblog-right-biaoqian-wrapper ul li:nth-child(8n-3){
        background-color: #756f71;
    }
    .mblog-right-biaoqian-wrapper ul li:nth-child(8n-2){
        background-color: #54DF90;
    }
    .mblog-right-biaoqian-wrapper ul li:nth-child(8n-1){
        background-color: #7886d7;
    }
    .mblog-right-biaoqian-wrapper ul li:nth-child(8n){
        background-color: #83AF9B;
    }

    /**
    站点信息
     */
    .mblog-right-s-data ul{
        padding: 0 10px;
    }
    .mblog-right-s-data ul li {
        list-style: none;
        line-height: 30px;
        font-size:14px;
    }
    .mblog-right-s-data ul li span{
        font-weight: bolder;
        font-size:14px;
    }
</style>