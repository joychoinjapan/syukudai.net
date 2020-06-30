<template>
    <div class="card-content answer-block p-0">
        <article v-for="question in questions" class="media">
            <figure class="media-left">
                <p class="image is-64x64">
                    <img src="https://bulma.io/images/placeholders/128x128.png">
                </p>
            </figure>
            <div class="media-content">
                <div class="content">
                    <p>
                        <strong class="small">{{question.user.name}}</strong>
                        <br>
                        <a :href="'/questions/'+question.id" class="is-hoverable">
                            <strong>{{question.title}}</strong>
                            <br>
                            <span v-for="topic in question.topics" class="tag is-info is-light is-rounded">{{topic.name}}</span>
                        </a>
                        <br>
                        <small>
                            <a><span class="tag is-success is-light">Aポイント</span>230</a>·
                            <a>回答 {{question.answers_count}}</a> ·
                            <a>フォロー {{question.followers_count}}</a>
                        </small>
                    </p>
                </div>
                <article v-for="answer in question.answers" class="media">
                    <figure class="media-left">
                        <p class="image is-48x48">
                            <img src="https://bulma.io/images/placeholders/96x96.png">
                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong>Sean Brown</strong>
                                <span class="tag answer-rec ms-1">オススメ</span>
                                <span class="tag answer-adopted ms-1">採用済</span>
                                <br>
                                {{delHtmlTag(answer.content)}}
                                <br>
                                <small><a>いいね 12</a> · <a>ストック 21</a></small>
                            </p>
                        </div>
                    </div>
                </article>
            </div>
        </article>
    </div>
</template>

<script>
    export default {
        name: "QuestionsList",
        props:{
            questions:Array
        },
        methods:{
            delHtmlTag(str){
                return str.replace(/<[^>]+>/g, "");
            }
        }
    }
</script>

<style scoped>

</style>
