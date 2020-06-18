<template>
    <article class="message is-small" :class="success">
        <div class="message-body p-1">
            <p v-text="msgContent"></p>
            <a><i class="fas fa-times mx-2"></i></a>
        </div>
    </article>
</template>

<script>
    export default {
        name: "MessageDialog",
        props:['isSuccess'],
        computed:{
            success(){
                return this.isSuccess==1?'is-success':' is-danger';
            },
            msgContent(){
                return this.isSuccess==1?
                    'プロフィールを更新しました':'プロフィールを更新するには問題が発生しています'
            }
        }
    }
</script>

<style scoped>
    .message-body{
        display: flex;
    }
    article{
        width: fit-content;
    }

    a{
        float:right;
    }
</style>
