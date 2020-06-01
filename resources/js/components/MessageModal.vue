<template>
    <div class="modal is-active">
        <div class="modal-background">background</div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title" v-text="user_name"></p>
                <button class="delete" aria-label="close" @click="$emit('close')"></button>
            </header>
            <section class="modal-card-body dialog-body">
                <article-you v-for="listing in listings"
                             v-bind:key="listing.index"
                             :body="listing.body"
                             :isMine="listing.to_user_id == user_id">
                </article-you>
            </section>
            <section class="modal-card-body text-body">
                <textarea class="message-input" placeholder="メッセージをご入力ください" v-model="messageContent"></textarea>
                <button class="button is-info" :class="[isSending]"　
                        @click="store" v-text="text" :disabled="isButtonDisabled">
                </button>
            </section>
        </div>
    </div>
</template>

<script>
    import ArticleYou from "./ArticleYou";
    export default {
        name: "MessageModal",
        components: {ArticleYou},
        props: ['user_id','user_name'],
        data() {
            return {
                messageContent: '',
                Sending: false,
                listings:[]
            }
        },
        mounted() {
            axios({
                method:'post',
                url:'/api/message/list',
                data:{
                    user_id:this.user_id
                }
            }).then(response => {
               this.listings=response.data.data
            }).catch(error => {
                console.log('error');
            })
        },
        computed: {
            isSending() {
                return this.Sending ? 'is-loading' : 'is-light';
            },
            text() {
                return this.Sending ? '送信中' : '送信';
            },
            isButtonDisabled() {
                return !this.messageContent;
            }
        },
        methods: {
            store() {
                this.Sending = true;
                axios({
                    method: 'post',
                    url: '/api/message/store',
                    data: {
                        user_id: this.user_id,
                        body: this.messageContent
                    }
                }).then(response => {
                    this.messageContent = null;
                    this.Sending = false;
                }).catch(error => {
                    this.Sending = false;
                })
            }

        }
    }
</script>

<style scoped>
    .modal {
        z-index: 3;
    }


    .dialog-body{
        height: 65%;
    }

    .text-body{
        height:35%;
    }

    .message-input {
        width: 100%;
        border: none;
        resize: none;
        background: transparent;
        height: 80%;
    }

    .message {
        width: 60%;
    }

    .message-input {
        outline: none;
    }

    button {
        float: right;
    }


</style>
