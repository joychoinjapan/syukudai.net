<template>
    <div class="modal is-active">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="comment-title">コメント23件</p>
                <button class="delete" aria-label="close" @click="$emit('close')"></button>
            </header>
            <section class="modal-card-body">
                <article class="media">
                    <div class="media-left">
                        <figure class="image is-32x32">
                            <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
                        </figure>
                    </div>
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong>John Smith</strong>
                                <br>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa
                                fringilla egestas. Nullam condimentum luctus turpis.
                            </p>
                        </div>
                    </div>
                </article>
                <article class="media">
                    <div class="media-left">
                        <figure class="image is-32x32">
                            <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
                        </figure>
                    </div>
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong>John Smith</strong>
                                <br>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa
                                fringilla egestas. Nullam condimentum luctus turpis.
                            </p>
                        </div>
                    </div>
                </article>
                <article class="media">
                    <div class="media-left">
                        <figure class="image is-32x32">
                            <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
                        </figure>
                    </div>
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong>John Smith</strong>
                                <br>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa
                                fringilla egestas. Nullam condimentum luctus turpis.
                            </p>
                        </div>
                    </div>
                </article>
                <article class="media">
                    <div class="media-left">
                        <figure class="image is-32x32">
                            <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
                        </figure>
                    </div>
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong>John Smith</strong>
                                <br>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa
                                fringilla egestas. Nullam condimentum luctus turpis.
                            </p>
                        </div>
                    </div>
                </article>
                <article class="media">
                    <div class="media-left">
                        <figure class="image is-32x32">
                            <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
                        </figure>
                    </div>
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong>John Smith</strong>
                                <br>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa
                                fringilla egestas. Nullam condimentum luctus turpis.
                            </p>
                        </div>
                    </div>
                </article>
                <article class="media">
                    <div class="media-left">
                        <figure class="image is-32x32">
                            <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
                        </figure>
                    </div>
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong>John Smith</strong>
                                <br>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa
                                fringilla egestas. Nullam condimentum luctus turpis.
                            </p>
                        </div>
                    </div>
                </article>
                <article class="media">
                    <div class="media-left">
                        <figure class="image is-32x32">
                            <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
                        </figure>
                    </div>
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong>John Smith</strong>
                                <br>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa
                                fringilla egestas. Nullam condimentum luctus turpis.
                            </p>
                        </div>
                    </div>
                </article>
                <article class="media">
                    <div class="media-left">
                        <figure class="image is-32x32">
                            <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
                        </figure>
                    </div>
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong>John Smith</strong>
                                <br>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa
                                fringilla egestas. Nullam condimentum luctus turpis.
                            </p>
                        </div>
                    </div>
                </article>
            </section>
            <section class="modal-card-body text-body">
                <textarea class="message-input" placeholder="コメントをご入力ください"></textarea>
                <button class="button is-info is-outlined is-small">コメントする</button>
            </section>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Comments",
    }
</script>

<style scoped>
    .comment-title {
        flex-grow: 1;
    }

    .media-left {
        margin: 0.3rem 0.5rem 0.5rem 0.5rem;
    }

    .modal-card-body{
        height: 75%;
    }

    .text-body{
        height: 25%;
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
