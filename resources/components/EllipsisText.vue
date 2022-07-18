<template>
    <p class="mblog_ellipsis_text">
        <slot></slot>
    </p>
</template>

<script>
    export default {
        name: 'ellipsis_text',
        props:{
            height:Number,
        },
        data: function () {
            return {
                mHeight:40
            }
        },
        created:function () {
            this.mHeight = this.height ? this.height : this.mHeight;
        },
        mounted: function () {
            this.$el.style.height = this.mHeight + 'px';
        }
    }
</script>

<style>
    p.mblog_ellipsis_text {
        position: relative;
        line-height: 20px;
        padding: 0 7px;
        overflow: hidden;
        word-break: break-all;
    }

    p.mblog_ellipsis_text::after {
        content: "...";
        font-weight: bold;
        position: absolute;
        bottom: 0;
        right: 0;
        padding: 0 13px 0 30px;
        line-height: 20px;
        /* 为了展示效果更好 */
        background: -webkit-gradient(linear, left top, right top, from(transparent), to(white), color-stop(50%, white));
        background: -moz-linear-gradient(to right, transparent, white 50%, white);
        background: -o-linear-gradient(to right, transparent, white 50%, white);
        background: -ms-linear-gradient(to right, transparent, white 50%, white);
        background: linear-gradient(to right, transparent, white 50%, white);
    }
</style>