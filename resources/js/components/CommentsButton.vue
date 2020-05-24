<template>
    <button class="button is-white" v-on:click="showHandler">
        <i class="far fa-comment-dots"></i>
        <span>コメント23件</span>
    </button>
</template>

<script>
    export default {
        name: "CommentsButton",
        methods:{
            showHandler(){
                this.$emit('show');
            }
        }
    }
</script>

<style scoped>

</style>
