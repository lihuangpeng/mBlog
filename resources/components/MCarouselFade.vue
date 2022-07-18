<template>
    <div
            class="m-carousel-fade"
            @touchstart="moveStart"
            @touchmove="moving"
            @touchend="moveEnd">
        <div class="m-carousel-fade-option">
            <div :class="leftBtnClass?'m-carousel-fade-left ' + leftBtnClass : ''" @click="left"></div>
            <div :class="rightBtnClass?'m-carousel-fade-left1 ' + rightBtnClass : ''" @click="right"></div>
            <div :class="'m-carousel-fade-point-list ' + pointBtnClass">
                <div
                        :class="{
            'm-carousel-fade-point':children_info.point==undefined,
            'm-carousel-fade-img':children_info.point!=undefined,
            'active':key==index
          }"
                        v-for="(children_info, key) in childrenList"
                        :key="key"
                        @click="show(key)">
                    <div v-if="children_info.point!=undefined&&platform=='pc'" class="m-carousel-fade-img-bg"></div>
                    <img :src="children_info.point" alt="">
                </div>
            </div>
        </div>
        <slot></slot>
    </div>
</template>

<script>
    export default {
        name: 'MCarouselFade',
        props: {
            active: Number,
            autoplay: Boolean,
            type: String,
            leftBtnClass: String,
            rightBtnClass: String,
            pointBtnClass: String,
            updateCallback: Function,
        },
        data: function(){
            return {
                minIndex: 0,
                maxIndex: 0,
                index: 0,
                childrenList:[],
                touchX:0,
                touchFlag:false,
                platform:'mobile',
                timer_id : 0,
            };
        },
        created:function(){
        },
        mounted: function(){
            this.childrenList = this.$children;
            this.maxIndex = this.childrenList.length - 1;
            this.index = this.active?this.active:0;
            if (/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
                this.platform = 'mobile';
            }else{
                this.platform = 'pc';
            }
            this.addInterval();
        },
        updated: function(){
            this.updatedChildren();
        },
        methods: {
            addInterval:function () {
                if(this.autoplay){
                    this.timer_id = setInterval(()=>{
                            this.right();
                    },3000);
                }
            },
            clearInterval:function () {
                if(this.autoplay && this.timer_id) clearInterval(this.timer_id);
            },
            updatedChildren: function(){
                for(let index in this.childrenList){
                    this.childrenList[index].show();
                }
            },
            left: function(){
                this.clearInterval();
                this.index--;
                if(this.index<0){
                    this.index = this.maxIndex;
                }
            },
            right: function(){
                this.clearInterval();
                this.index++;
                if(this.index>this.maxIndex){
                    this.index = this.minIndex;
                }
            },
            show: function(key){
                this.clearInterval();
                this.index = key;
            },
            moveStart: function(event){
                this.touchX = event.touches[0].clientX;
            },
            moving: function(event){
                if(!this.touchFlag){
                    this.touchFlag = true;
                    let x = event.touches[0].clientX;
                    setTimeout(()=>{
                        this.touchFlag = false;
                }, 1000);
                    if(x > this.touchX){
                        this.left();
                    }else if(x < this.touchX){
                        this.right();
                    }
                }
            },
            moveEnd: function(){
                this.touchX = 0;
                this.touchFlag = false;
            }
        },
        watch: {
            'index': {
                handler(n){
                    if(this.updateCallback){
                        this.updateCallback(n);
                    }
                    this.addInterval();
                }
            }
        },
    }
</script>

<style>
    .m-carousel-fade{
        position: relative;
        width:100%;
        height:100%;
    }
    .m-carousel-fade-box{
        width:80%;
    }
    .m-carousel-fade-option{
        position: absolute;
        display: flex;
        align-items: center;
        top:0;
        left: 0;
        z-index:5;
        width:100%;
        height:100%;
    }
    .m-carousel-fade-left{
        position: absolute;
        left:300px;
        font-size: 50px;
        color:#FFF;
        cursor: pointer;
        width:30px;
        height:55px;
    }
    .m-carousel-fade-left1{
        position: absolute;
        right:300px;
        font-size: 50px;
        color:#FFF;
        cursor: pointer;
        width:30px;
        height:55px;
    }
    .m-carousel-fade-point-list{
        position:absolute;
        left:0;
        right:0;
        bottom: 200px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .m-carousel-fade-point-list .m-carousel-fade-point{
        cursor: pointer;
        width:15px;
        height:15px;
        margin:10px;
        background: #FFF;
        border-radius: 15px;
        transition: all 0.3s;
        -moz-transition: all 0.3s;
        -webkit-transition: all 0.3s;
        -o-transition: all 0.3s;
    }
    .m-carousel-fade-point-list .m-carousel-fade-point.active{
        width:50px;
        background:#F8A90E;
    }
    .m-carousel-fade-point-list .m-carousel-fade-img{
        position: relative;
        cursor: pointer;
        width:100px;
        height:100px;
        margin:-50px 30px;
        /* background: #FFF; */
        /* border:3px solid #FFF; */
        /* box-shadow: -5px 5px 2px 4px #363636; */
        transition: all 0.3s;
        -moz-transition: all 0.3s;
        -webkit-transition: all 0.3s;
        -o-transition: all 0.3s;
    }
    .m-carousel-fade-point-list .m-carousel-fade-img .m-carousel-fade-img-bg{
        position: absolute;
        top:0px;
        left:-10px;
        width:110px;
        height:110px;
        background:rgba(0, 0, 0, 0.5);
        z-index:-1;
    }
    .m-carousel-fade-point-list .m-carousel-fade-img.active .m-carousel-fade-img-bg{
        background:rgba(0, 0, 0, 0.8);
    }
    .m-carousel-fade-point-list .m-carousel-fade-img img{
        box-shadow: 0 0 1px 5px #000;
    }
    .m-carousel-fade-point-list .m-carousel-fade-img.active img{
        box-shadow: 0 0 0 5px #E33333;
    }
</style>