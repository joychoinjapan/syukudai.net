<template>
    <div class="modal is-active">
        <div class="modal-background">background</div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Shu Wei</p>
                <button class="delete" aria-label="close" @click="$emit('close')"></button>
            </header>
            <section class="modal-card-body">
                <article class="message message-to">
                    <div class="message-body">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </div>
                </article>
                <article class="message is-primary message-from">
                    <div class="message-body right-body">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </div>
                </article>
            </section>
            <section class="modal-card-body">
               <textarea class="message-input" placeholder="メッセージをご入力ください"></textarea>
               <button class="button is-primary is-light">送信</button>
            </section>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MessageModal",
    }
</script>

<style scoped>
    .modal{
        z-index: 3;
    }

    .message-input{
        width: 100%;
        border: none;
        resize:none;
        background: transparent;
        max-height: 40em;
        min-height: 8em;
    }

    .message{
        width: 60%;
    }

    .message-to{
        float: left;
    }

    .message-from{
        float: right;
    }

    .message-input{
        outline:none;
    }

    .right-body{
        border-width: 0 4px 0 0;
    }

    button{
        float:right;
    }




</style>
