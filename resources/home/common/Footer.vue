<template>
    <footer>
        <section class="mblog-body-footer-wrapper">
            Copyright © 2022 李煌鹏个人博客 | | 网站备案号：<a href="https://beian.miit.gov.cn/"
                                                  target="_blank">湘ICP备2022006383号-1</a>
        </section>
        <section class="mblog-body-footer-top" v-show="show" @click="positionTop()">
            <i class="el-icon el-icon-top"></i>
        </section>
    </footer>
</template>
<script>
    export default{
        name:'Footer',
        mounted:function () {

        },
        data:function () {
            return {
                show : 0
            }
        },
        methods:{
            positionTop:function () {
                var top = window.getScrollTop();
                var timer = setInterval(function () {
                    var step = Math.ceil(top / 10);
                    top = top - step < 0 ? 0 : top-step;
                    window.scroll(0,top);
                    if (top == 0) {
                        clearInterval(timer);
                    }
                }, 10);
            }
        }
    }
</script>
<style>
    .mblog-body-footer-wrapper {
        padding: 45px 20px;
        text-align: center;
        background: #111;
        color: #fff;
        position: relative;
        bottom: 0;
    }

    .mblog-body-footer-wrapper a {
        color: #ff4d3a;
        text-decoration: none;
    }

    footer .mblog-body-footer-top {
        background: #111;
        border-radius: 50%;
        position: fixed;
        bottom: 130px;
        right: 5%;
        cursor:pointer;
    }

    footer .mblog-body-footer-top .el-icon-top {
        color: white;
        font-size: 18px;
        padding: 10px 10px;
    }
</style>