<template>
    <button class="button is-outlined"
            :class="userIsFollowed"
            v-text="text"
            @click="follow"
    ></button>
</template>

<script>
    export default {
        name: "UserFollowButton.vue",
        props: ['follower_id', 'followed_id'],
        mounted() {
            //該当回答のユーザーをすでにフォローしているか
            axios.get('/api/user/isfollowed/' + this.followerAndFollowed.followed_id)
                .then(response => {
                    this.isFollowed = response.data.is_followed
                })
                .catch(function (error) {
                    console.log(error)
                })
        },
        data() {
            return {
                isFollowed: false,
                followerAndFollowed: {
                    follower_id: this.follower_id,
                    followed_id: this.followed_id
                },
            }
        },
        computed: {
            userIsFollowed() {
                return this.isFollowed ? '' : 'is-link'
            },
            text() {
                return this.isFollowed ? 'フォロー解除' : 'フォローする'
            }
        },
        methods: {
            follow() {
                axios({
                    method: 'post',
                    url: '/api/user/follow',
                    data: {
                        user_id: this.followerAndFollowed.followed_id
                    }
                }).then(response => {
                    this.isFollowed = response.data.isFollowed
                }).catch(error => {
                    console.log(error)
                })

            }
        }
    }
</script>

<style scoped>

</style>
