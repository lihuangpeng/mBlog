<template>
    <header class="mblog-header-wrapper">
        <el-row type="flex" class="mblog-header-container">
            <el-col :xs="6" :sm="3" :md="4">
                <img :src="logo"/>
            </el-col>
            <el-col class="hidden-xs-only" :sm="6" :md="5" style="text-align: right">
                <input type="text" placeholder="搜索">
            </el-col>
            <el-col class="hidden-xs-only" :sm="12" :md="9">
                <ul class="mblog-header-menu">
                    <li  v-for="(item,key) in menu_list" :key="key" :class="item.name == active ? 'active' : ''" @click="menu_click(item.name)">
                        {{item.desc}}
                    </li>
                </ul>
            </el-col>
            <el-col v-show="!is_login" :sm="3" :md="6" class="mblog-header-login-container hidden-xs-only">
                <a href="javascript:;" id="mblog-header-login">登录/注册</a>
            </el-col>
            <el-col v-show="is_login" :sm="6" :md="6" class="mblog-header-login-container hidden-xs-only">
                <section @mouseover="show_user_center = true" @mouseleave="show_user_center = false">
                    <el-image :src="header_img" class="mblog-header-image mblog-header-pc-image"></el-image>
                    <nav class="mblog-header-user-center" v-show="show_user_center">
                        <ul>
                            <li @click="menu_click('UserCenter')">个人中心</li>
                            <li @click="logout()">退出</li>
                        </ul>
                    </nav>
                </section>
            </el-col>
            <el-col :xs="18" class="hidden-sm-and-up mblog-mobile-container" style="position:relative">
                <section class="mblog-header-section">
                    <section
                            v-bind:class="this.show == 1 ? 'mblog-header-section-title active' : 'mblog-header-section-title'"
                            @click="show = !show">
                        <span></span>
                        <span></span>
                        <span></span>
                    </section>
                    <section class="mblog-header-section-container" v-show="show">
                        <ul>
                            <li v-for="(item,key) in menu_list" :key="key" :class="item.name == active ? 'active' : ''" @click="menu_click(item.name)" v-if="item.name != 'guest_books' || is_login">
                                {{item.desc}}
                            </li>
                            <li>
                                <input type="text" placeholder="搜索">
                            </li>
                            <li v-show="!is_login"><a href="javascript:;" id="mblog-header-mobile-login">登录/注册</a></li>
                            <li v-show="is_login">
                                <section @mouseover="show_user_center = true" @mouseleave="show_user_center = false">
                                <el-image :src="header_img" class="mblog-header-image"></el-image>
                                <nav class="mblog-header-user-center" v-show="show_user_center">
                                    <ul>
                                        <li @click="menu_click('UserCenter')">个人中心</li>
                                        <li @click="logout()">退出</li>
                                    </ul>
                                </nav>
                            </section></li>
                        </ul>
                    </section>
                </section>
            </el-col>
        </el-row>
    </header>
</template>
<script>
    import Cookie from "@Assets/js/cookie";
    import User from "@Assets/js/api/user";
    import Posts from "@Assets/js/api/posts";
    export default{
        name: 'Head',
        data: function () {
            return {
                logo: require("@Assets/images/logo.jpg").default,
                show: 0,
                is_login: false,
                header_img: require('@Assets/images/default_header_img.jpg').default,
                plat_user_name:'',
                active: 'Home',
                last_active : 'Home',
                menu_list: [
                    {name: 'Home', desc: '首页'},
                    {name: 'Video', desc: '视频教程'},
                    {name: 'Posts', desc: '文章教程'},
                    {name: 'About', desc: '关于作者'},
                    {name: 'GuestBooks', desc: '留言板'},
                ],
                show_user_center:false
            }
        },
        methods: {
            logout: function () {
                this.$confirm('是否确认退出登录？', '', {
                    distinguishCancelAndClose: true,
                    cneter:true,
                    confirmButtonText: '确认',
                    cancelButtonText: '取消'
                }).then(()=>{
                    this.$message({
                    'message': '退出成功',
                    'type': 'success'
                });
                this.bindMSdk();
                window.localStorage.removeItem('authorization');
                this.is_login = false;
            }).
                catch((action)=>{}
                )
                ;
            },
            bindMSdk: function () {
                window.mSDK.bind("mblog-header-login");
                window.mSDK.bind("mblog-header-mobile-login");
            },
            menu_click: function (name) {
                if(this.active === name) return false;
                this.last_active = this.active;
                this.active = name;
                this.$router.push({name:this.active});
            },
        },
        created: function () {
            this.$router.onReady(() => {
                this.active = this.$route.name
            });
            let msdk_code = this.$cookie.getCookie('msdk_code');
            if (msdk_code) {
                let instance = this.$loading();
                User.sdkLogin(msdk_code).then((data)=>{
                    this.$cookie.delCookie('msdk_code');
                    instance.close();
                    if (data.code == 200) {
                        window.localStorage.setItem('authorization', data.data.token);
                        window.localStorage.setItem('authorization.create_time', (new Date()).getTime());
                        window.localStorage.setItem('plat_user_name', data.data.plat_user_name);
                        window.localStorage.setItem('header_img', data.data.header_img);
                        if(data.data.header_img){
                            this.header_img = data.data.header_img;
                        }
                        this.plat_user_name = data.data.plat_user_name;
                        this.is_login = true;
                        this.$message({
                            message: '登陆成功',
                            type: 'success',
                        });
                    } else {
                        this.$message.error(data.msg);
                    }
                }).catch(()=>{
                    this.$cookie.delCookie('msdk_code');
                    instance.close();
                    this.$message.error('接口异常,请重新登录');
                    return false;
                });
            } else if(window.localStorage.getItem('authorization')){
                let create_time = window.localStorage.getItem('authorization.create_time');
                let now = (new Date()).getTime();
                if (now - create_time > 15 * 60 * 1000) {
                    let authorization = window.localStorage.getItem('authorization');
                    User.refreshToken(authorization).then((data)=>{
                        if(data.code == 200){
                            window.localStorage.setItem('authorization', data.data);
                            window.localStorage.setItem('authorization.create_time', (new Date()).getTime());
                        }else{
                            this.$message.error(data.msg);
                            this.bindMSdk();
                            window.localStorage.removeItem('authorization');
                            setTimeout(function () {
                                window.location.href = "http://mblog.com";
                            },1000);
                        }
                    }).catch(()=>{
                            return false;
                    });
                }
            }
        },
        mounted: function () {
            this.active = this.$router.history.current.name;
            if (!window.localStorage.getItem('authorization')) {
                this.bindMSdk();
            } else {
                this.plat_user_name = window.localStorage.getItem('plat_user_name');
                if(window.localStorage.getItem('header_img')){
                    this.header_img = window.localStorage.getItem('header_img');
                }
                this.is_login = true;
            }
        }

    }
</script>

<style>

    .mblog-header-wrapper {
        background-color: #fff;
        height: 80px;
        width: 100%;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 100;
        box-shadow: 0 2px 6px 0 rgba(0, 0, 0, .17);
    }

    .mblog-header-container {
        width: 85%;
        margin: auto;
    }
    .mblog-header-container .mblog-header-image img{
        width: 45px;
        height: 45px;
        cursor: pointer;
    }
    .mblog-header-container .mblog-header-pc-image img{
        margin-top: 13px;
    }

    .mblog-header-container img {
        width: 105px;
        height: 90px;
    }

    .mblog-header-container input {
        position: relative;
        top: 20px;
        width: 60%;
        line-height: 32px;
        height: 32px;
        padding: 0 10px;
        border: 1px solid #888888;
        border-radius: 3px;
    }

    .mblog-header-container input:focus {
        border-color: transparent;
    }

    .mblog-header-container .mblog-header-menu li {
        list-style: none;
        width: 25%;
        height: 70px;
        line-height: 70px;
        text-align: center;
        cursor: pointer;
    }

    .mblog-header-container .mblog-header-menu li.active {
        color: #409eff;
    }

    .mblog-header-container .mblog-header-menu {
        display: flex;
    }

    .mblog-header-container a {
        text-decoration: none;
        color: black;
        height: 70px;
        line-height: 70px;
    }

    .mblog-header-login-container {
        height: 70px;
        line-height: 70px;
        text-align: center;
        position:relative;
    }

    .mblog-header-section {
        position: absolute;
        right: 22px;
        top: 10px;
    }

    .mblog-header-section span {
        width: 25px;
        height: 2px;
        margin-top: 7px;
        background-color: #888888;
        display: block;
    }

    .mblog-header-section-container {
        position: absolute;
        background-color: white;
        width: 150px;
        top: 50px;
        left: -103px;
    }

    .mblog-header-section-container ul li {
        list-style: none;
        text-align: center;
        padding: 10px 0;
        cursor: pointer;
        border-bottom: 1px solid #ddd;
    }

    .mblog-header-section span {
        transition: transform 0.3s ease;
    }

    .mblog-header-section .active span:nth-child(1) {
        transform: rotateZ(45deg);
        margin-top: 14px;
    }

    .mblog-header-section .active span:nth-child(2) {
        display: none;
    }

    .mblog-header-section .active span:nth-child(3) {
        transform: rotateZ(-45deg);
        margin-top: -2px;
    }

    .mblog-header-section-container ul li input {
        top: 0;
    }
    .mblog-header-user-center{
        position:relative;
        top:-37px;
        box-shadow: 0px 0px 1px 1px #f5f5f5;
        background-color: white;
        width:100px;
        margin: auto;
        height: auto;
    }

    .mblog-header-user-center ul li{
        list-style: none;
        height: 30px;
        line-height: 30px;
        cursor:pointer;
    }
    .mblog-header-user-center ul li:hover{
        background-color: #f5f5f5;
    }

    @media screen and (max-width: 767px) {
        .mblog-header-wrapper {
            height: 60px;
        }

        .mblog-header-container {
            width: 100%;
        }

        .mblog-header-container img {
            height: 65px;
            width: 80px;
        }
        .mblog-header-user-center{
            width:100%;
            top:10px;
        }
    }

</style>