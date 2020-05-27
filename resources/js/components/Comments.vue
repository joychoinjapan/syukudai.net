<template>
    <div class="modal is-active">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="comment-title">コメント {{lists.length}} 件</p>
                <button class="delete" aria-label="close" @click="$emit('close')"></button>
            </header>
            <section  v-if="!!lists.length" class="modal-card-body">
                <article class="media" v-for="list in lists">
                    <div class="media-left">
                        <figure class="image is-32x32">
                            <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
                        </figure>
                    </div>
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong>{{list.user.name}}</strong>
                                <br>
                                {{list.body}}
                            </p>
                        </div>
                    </div>
                </article>
            </section>
            <section class="modal-card-body text-body">
                <textarea class="message-input" placeholder="コメントをご入力ください" v-model="body"></textarea>
                <button class="button is-info is-outlined is-small"
                        @click="store"
                        :disabled="!this.body">コメントする
                </button>
            </section>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Comments",
        props: ['type', 'id','lists'],
        data() {
            return {
                body: '',
            }
        },
        methods: {
            store() {
                axios({
                    method: 'post',
                    url: '/api/comment',
                    data: {
                        body: this.body,
                        type: this.type,
                        id: this.id
                    }
                }).then(response => {
                    this.body = ''
                    this.$parent.getList(this.type,this.id)
                }).catch(error => {
                    console.log(error)
                })
            }
        }
    }
</script>

<style scoped>
    .comment-title {
        flex-grow: 1;
    }

    .media-left {
        margin: 0.3rem 0.5rem 0.5rem 0.5rem;
    }

    .modal-card-body {
        height: 75%;
    }

    .text-body {
        height: 25%;
        min-height: 10rem;
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
