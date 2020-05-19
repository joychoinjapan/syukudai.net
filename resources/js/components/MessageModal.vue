<template>
    <div class="modal is-active">
        <div class="modal-background">background</div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Shu Wei</p>
                <button class="delete" aria-label="close" @click="$emit('close')"></button>
            </header>
            <section class="modal-card-body">
                <article-you></article-you>
                <article-me></article-me>
            </section>
            <section class="modal-card-body">
                <textarea class="message-input" placeholder="メッセージをご入力ください" v-model="messageContent"></textarea>
                <button class="button is-info" :class="[isSending]"　
                        @click="store" v-text="text" :disabled="isButtonDisabled">
                </button>
            </section>
        </div>
    </div>
</template>

<script>
    import ArticleMe from "./ArticleMe";
    import ArticleYou from "./ArticleYou";
    export default {
        name: "MessageModal",
        components: {ArticleMe,ArticleYou},
        props: ['user_id'],
        data() {
            return {
                messageContent: '',
                Sending: false
            }
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

    .message-input {
        width: 100%;
        border: none;
        resize: none;
        background: transparent;
        max-height: 40em;
        min-height: 8em;
    }

    .message {
        width: 60%;
    }

    .message-to {
        float: left;
    }

    .message-from {
        float: right;
    }

    .message-input {
        outline: none;
    }

    .right-body {
        border-width: 0 4px 0 0;
    }

    button {
        float: right;
    }


</style>
