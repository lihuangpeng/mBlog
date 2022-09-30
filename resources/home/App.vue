<template>
    <section style="width: 100%;height: 100%;" class="mblog-wrapper">

        <Head ref="header"></Head>
        <section class="mblog-container">
            <section v-if="!isRouteAlive" style="min-height: 600px"></section>
            <router-view id="view" ref="view" v-else-if="isRouteAlive === true"></router-view>
        </section>
        <section class="mblog-main-footer-wrapper" v-show="showMainFooter" ref="main_footer">
            <section class="mblog-main-footer-container">
                <h3>友情链接</h3>
                <ul>
                    <li><a href="http://www.baidu.com" target="_blank">百度搜索</a></li>
                    <li><a href="https://connect.qq.com" target="_blank">QQ互联</a></li>
                </ul>
            </section>
        </section>
        <Footer ref="footer"></Footer>
    </section>
</template>
<script>
    import Footer from "@Views/common/Footer";
    import Head from "@Views/common/Head";
    import Home from "@Views/common/Home"
    export default {
        name: "PC",
        components: {
            Head,
            Footer,
            Home
        },
        data: function () {
            return {
                isRouteAlive : false,
            };
        },
        created: function () {
            this.$router.onReady(()=>{
                this.isRouteAlive = true;
            })
        },
        mounted: function () {
            this.$router.onReady(()=>{
                window.addEvent(window, 'scroll', () => {
                    let top = window.getScrollTop();
                    if (top > 0) {
                        this.$refs.footer.show = 1
                    } else {
                        this.$refs.footer.show = 0;
                    }

                    let path = this.$router.history.current.path;
                    //全部高度
                    let scrollHeight = document.documentElement.scrollHeight || document.body.scrollHeight;
                    var allHeight;
                    switch (path) {
                        case '/':
                            allHeight = this.$refs.header.$el.clientHeight + 10
                                + this.$refs.view.$refs.right.$el.clientHeight + top +
                                this.$refs.footer.$el.clientHeight + this.$refs.main_footer.clientHeight;
                            this.$refs.view.$refs.right.$el.removeAttribute('style');
                            if (top >= this.$refs.view.$el.querySelector('.mblog-main-header').clientHeight + this.$refs.header.$el.clientHeight && allHeight < scrollHeight) {
                                this.$refs.view.$refs.right.$el.style.position = 'fixed';
                                this.$refs.view.$refs.right.$el.style.top = this.$refs.header.$el.clientHeight + 10 + 'px';
                                this.$refs.view.$refs.right.$el.style.width = '24%';
                            } else if (allHeight >= scrollHeight) {
                                this.$refs.view.$refs.right.$el.style.position = 'absolute';
                                this.$refs.view.$refs.right.$el.style.bottom = 0;
                                this.$refs.view.$refs.right.$el.style.width = '28%';
                            }
                            break;
                        case '/posts':
                            allHeight = this.$refs.header.$el.clientHeight + 10
                                + this.$refs.view.$refs.right.$el.clientHeight + top +
                                this.$refs.footer.$el.clientHeight + this.$refs.main_footer.clientHeight;
                            this.$refs.view.$refs.right.$el.removeAttribute('style');
                            if (top >= this.$refs.view.$el.querySelector('.mblog-posts-category').clientHeight + this.$refs.header.$el.clientHeight && allHeight < scrollHeight) {
                                this.$refs.view.$refs.right.$el.style.position = 'fixed';
                                this.$refs.view.$refs.right.$el.style.top = this.$refs.header.$el.clientHeight + 10 + 'px';
                                this.$refs.view.$refs.right.$el.style.width = '24%';
                            } else if (allHeight >= scrollHeight) {
                                this.$refs.view.$refs.right.$el.style.position = 'absolute';
                                this.$refs.view.$refs.right.$el.style.bottom = 0;
                                this.$refs.view.$refs.right.$el.style.width = '28%';
                            }
                            break;
                        default:
                            break;
                    }
                });
            })
        },
        computed: {
            showMainFooter: {
                set: function () {

                },
                get: function () {
                    return this.$router.history.current.path == '/';
                }
            }
        }
    }
</script>
<style>
    * {
        margin: 0;
        padding: 0;
        font-size:12px;
    }

    .mblog-wrapper {
        width: 100%;
    }

    .mblog-title{
        font-size: 18px;
        line-height: 40px;
        border-bottom: 1px solid #eee;
        color: #484848;
        font-weight: normal;
        position: relative;
        margin-bottom: 10px;
    }

    .mblog-title:after{
        position: absolute;
        width: 60px;
        height: 2px;
        content: "";
        background: #000;
        left: 0;
        bottom: 0;
        -moz-transition: all .5s ease;
        -webkit-transition: all .5s ease;
        transition: all .5s ease;
    }

    .mblog-container {
        width: 84%;
        margin: 90px auto 0;
    }

    @media screen and (max-width: 768px) {
        .mblog-container {
            margin: 70px auto 0;
            width: 90%;
        }
    }

    .mblog-main-footer-wrapper {
        background-color: #202020;
        padding: 15px 0;
        color: #ccc;
    }

    .mblog-main-footer-wrapper .mblog-main-footer-container {
        width: 90%;
        margin: auto;
    }

    .mblog-main-footer-wrapper ul {
        list-style: none;
        display: flex;
    }

    .mblog-main-footer-wrapper ul li {
        padding: 10px 0 0 10px;
    }

    .mblog-main-footer-wrapper ul li a {
        color: #ff4d3a;
        text-decoration: none;
    }
</style>
