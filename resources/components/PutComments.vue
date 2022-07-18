<template>
    <section class="mblog-put-comments-wrapper">
        <textarea></textarea>
        <section>
            <el-upload
                    action="https://jsonplaceholder.typicode.com/posts/"
                    list-type="picture-card"
                    :on-preview="handlePictureCardPreview"
                    :on-remove="handleRemove">
                <i class="el-icon-plus"></i>
            </el-upload>
            <el-dialog :visible.sync="dialogVisible">
                <img width="100%" :src="dialogImageUrl" alt="">
            </el-dialog>
            <section>
                <span @click="putComponents()">发布评论</span>
            </section>
        </section>
    </section>
</template>
<script>
    export default{
        name:"PutComments",
        data:function () {
            return {
                dialogImageUrl: '',
                dialogVisible: false,
            };
        },
        methods:{
            handleRemove(file, fileList) {
                console.log(file, fileList);
            },
            handlePictureCardPreview(file) {
                this.dialogImageUrl = file.url;
                this.dialogVisible = true;
            },
            putComponents:function () {
                let is_login = window.localStorage.getItem('authorization');
                if(is_login){
                    this.$message({'message':'发布成功','type':'success'});
                }else{
                    let reg = /(phone|pad|pod|iPhone|iPod|ios|iPad|Android|Mobile|BlackBerry|IEMobile|MQQBrowser|JUC|Fennec|wOSBrowser|BrowserNG|WebOS|Symbian|Windows Phone)/i;
                    if(window.navigator.userAgent.match(reg)){
                        document.getElementById('mblog-header-mobile-login').click();
                    }else{
                        document.getElementById('mblog-header-login').click();
                    }
                }
            }
        },
    }
</script>
<style>
    .mblog-put-comments-wrapper{
        position: relative;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .mblog-put-comments-wrapper textarea{
        width: 97%;
        margin: 10px 1.5% 0;
        min-height: 200px;
        resize:none;
        border: none;
        outline: none;
        color: #333;
        font-size: 14px;
    }
    .mblog-put-comments-wrapper>section{
        position: relative;
        height: 40px;
        border-top:1px solid #cccccc;
    }
    .mblog-put-comments-wrapper>section section{
        position: absolute;
        right: 0;
        top:0;
        height: 40px;
        line-height: 40px;
        background-color: black;
        color: white;
        cursor: pointer;
    }

    .mblog-put-comments-wrapper>section section span{
        padding: 0 15px;
    }
    .mblog-put-comments-wrapper>section .el-upload--picture-card{
        height: 40px;
        width: 10%;
        border: none;
        border-left: 1px solid #c0ccda;
        border-right: 1px solid #c0ccda;
        border-radius: 0;
        line-height: 48px;
    }
    .mblog-put-comments-wrapper>section .el-upload-list--picture-card .el-upload-list__item{
        height: 40px;
        width: 10%;
    }
</style>