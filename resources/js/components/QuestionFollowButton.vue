<template>
    <button class="button is-link" :class="isFollowed"
            v-text="text"
            v-on:click="follow">
    </button>
</template>

<script>
    export default {
        props: ['question', 'user'],
        mounted() {
            axios.post('/api/question/follower', this.QuestionAndUser)
                .then(response => {
                        this.followed = response.data.followed;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        data() {
            return {
                followed: false,
                QuestionAndUser: {
                    'question': this.question,
                    'user': this.user
                }
            }
        },
        computed: {
            isFollowed() {
                return this.followed ? 'is-light' : 'is-link'
            },
            text() {
                return this.followed ? 'フォロー解除' : 'フォローする'
            }
        },
        methods: {
            follow() {
                //フォローしている場合、フォロー解除
                if (this.followed) {
                    axios.post('/api/question/unfollow', this.QuestionAndUser)
                        .then(response => {
                           this.followed = response.data.followed;
                        })
                        .catch(function (error) {
                            console.log(error);
                        });

                } else {
                    //フォローしていない場合、フォローする
                    axios.post('/api/question/follow', this.QuestionAndUser)
                        .then(response => {
                            this.followed = response.data.followed;
                        })
                        .catch(function (error) {
                        console.log(error);
                        });
                }
            }
        }

    }
</script>

<style scoped>

</style>
