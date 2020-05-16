<template>
    <button class="button is-info is-light" @click="vote()">
        <i class="fas fa-thumbs-up mr-1"></i>
        {{text}} {{count}}
    </button>
</template>

<script>
    export default {
        name: "UserVoteButton",
        props: ['votes_count', 'answer_id'],
        mounted() {
            axios.get('/api/answer/' + this.answer_id + '/voted')
                .then(response => {
                    this.voted = response.data.voted
                })
                .catch(error => {
                    console.log(error)
                })

        },
        data() {
            return {
                voted: false,
                count: this.votes_count
            }
        },
        methods: {
            vote() {
                axios({
                    method: 'post',
                    url: '/api/answer/vote',
                    data: {
                        'answer_id': this.answer_id
                    }
                })
                    .then(response => {
                        this.voted = response.data.voted
                        this.voted? this.count++:this.count--
                    })
                    .catch(error => {
                        console.log(error)
                    })
            }
        },
        computed: {
            text() {
                return this.voted ? '賛成済' : '賛成'
            }
        }
    }
</script>

<style scoped>

</style>
