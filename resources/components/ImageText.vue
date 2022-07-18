<template>
    <section class="mblog-image-text">
        <span>{{text}}</span>
    </section>
</template>
<script type="text/javascript">
    export default{
        name:'ImageText',
        props:{
            src:String,
            text:String,
            height:String
        },
        data:function () {
            return {

            }
        },
        created:function () {
        },
        mounted:function () {
            this.$el.style.backgroundImage = "url("+this.src+")";
            this.$el.style.height = this.height + 'px';
        }
    }
</script>
<style>
    .mblog-image-text{
        background-repeat:no-repeat;
        background-position:center center;
        background-size: 100% 100%;
        position:relative;
        overflow: hidden;
        cursor:pointer;
        transition: all ease 0.7s;
    }
    .mblog-image-text:hover{
        background-size: 110% 110%;
    }
    .mblog-image-text span{
        position: relative;
        overflow: hidden;
        left:0;
        width:80%;
        margin:auto;
        word-wrap: break-word;
        word-break: normal;
        text-align:center;
        top:30%;
        color: white;
        font-size: 17px;
        text-overflow: ellipsis;
        -webkit-box-orient: vertical;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        line-height: 24px;

    }
</style>