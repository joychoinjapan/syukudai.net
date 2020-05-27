<template>
    <button class="button is-white" v-on:click="showHandler">
        <i class="far fa-comment-dots"></i>
        <span>コメント{{count}}件</span>
    </button>
</template>
<script>
    export default {
        name: "QuestionCommentsButton",
        props:['type','id','count'],
        methods:{
            showHandler(){
                this.$parent.type=this.type;
                this.$parent.id=this.id;
                this.$emit('show');
            }
        }
    }
</script>

<style scoped>

</style>
