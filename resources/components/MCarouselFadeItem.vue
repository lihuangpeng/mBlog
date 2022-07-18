<template>
    <div
            class="m-carousel-fade-item"
            :class="{
      'active':active,
    }">
        <slot></slot>
    </div>
</template>

<script>
    export default {
        name: 'MCarouselFadeItem',
        props: {
            name: Number,
            point: String,
        },
        data: function(){
            return {
                active: false,
            };
        },
        methods: {
            show: function(){
                let index = this.$parent.index;
                if(index == this.name){
                    this.active = true;
                }else{
                    this.active = false;
                }
            }
        },
        mounted: function(){

        }
    }
</script>

<style>
    .m-carousel-fade-item{
        width:100%;
        justify-content: center;
        transition: all 0.3s;
        -moz-transition: all 0.3s;
        -webkit-transition: all 0.3s;
        -o-transition: all 0.3s;
        display:none;
    }
    .m-carousel-fade-item.active{
        z-index: 2;
        display: block;
    }
</style>