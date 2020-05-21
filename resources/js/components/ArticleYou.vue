<template>
    <article class="message" :class="[message_right]">
        <div class="message-body" :class="[message_body_right]">
           {{body}}
        </div>
    </article>
</template>

<script>
    export default {
        name: "ArticleYou",
        props:['body','isMine'],
        computed:{
            message_right(){
                return this.isMine?'message-from is-info':'message-to'
            },
            message_body_right(){
                return this.isMine?'right-body':'left-body'
            }
        }
    }
</script>

<style scoped>
    /*相手からのメッセージ*/
    .message-to {
        float: left;
    }

    /*こっちからのメッセージ*/
    .message-from {
        float: right;
    }

    .right-body {
        border-width: 0 4px 0 0;
    }

    .left-body{
        border-width: 0 0 0 4px;
    }

</style>
