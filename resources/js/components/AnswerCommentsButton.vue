<template>
    <button class="button is-light" @click="showHandler"><i class="fas fa-comment mr-1"></i>コメント</button>
</template>
<script>
    export default {
        name: "CommentsButton",
        props:['type','id'],
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
