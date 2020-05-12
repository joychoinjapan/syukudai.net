<template>
    <div class="media profile-small-box" @mouseenter="mouseEnter" @mouseleave="mouseOut">
        <div class="media-left">
            <figure class="image is-48x48">
                <img src="https://bulma.io/images/placeholders/96x96.png"
                     alt="Placeholder image">
            </figure>
        </div>
        <div class="media-content">
            <p class="title is-6 mb-1">{{name}}</p>
            <span class="tag is-info is-light is-rounded">{{field}}</span>
        </div>
        <div class="box profile-box" v-show="isActive">
            <article class="media">
                <div class="media-left">
                    <figure class="image is-64x64">
                        <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
                    </figure>
                </div>
                <div class="media-content">
                    <div class="content">
                        <p>
                            <strong>{{userInfo.name}}</strong>
                            <br>
                            <span class="profile-text">経験3年目のエンジニア、案件の連絡はメールまで</span>
                        </p>
                    </div>
                </div>
            </article>
            <div class="profile-info-container">
                <div class="profile-block"><p>回答</p> <strong>{{userInfo.answers}}</strong></div>
                <div class="profile-block"><p>文章</p> <strong>12,8773</strong></div>
                <div class="profile-block"><p>フォロワー</p> <strong>{{userInfo.followers}}</strong></div>
            </div>
            <div class="container button-container mt-2">
                <user-follow-button :followed_id="answerUserId" :follower_id="loginUserId" v-if="showButtons"></user-follow-button>
                <button class="button  is-info is-outlined" v-show="showButtons">メッセージ</button>
            </div>
        </div>
    </div>

</template>

<script>
    import UserFollowButton from "./UserFollowButton";

    export default {
        name: "UserProfilePop",
        components: {UserFollowButton},
        props: {
            name: String,
            field: String,
            login: Number|String,
            user:Number|String
        },
        data() {
            return {
                isActive: false,
                userInfo: {
                    followers: 0,
                    answers: 0,
                    name:this.name
                },
                loginUserId:this.login,
                answerUserId:this.user,
            }
        },
        computed:{
            showButtons(){
                return !!this.loginUserId
            }
        },
        methods: {
            mouseEnter() {
                axios.post('/api/user/follower', {'user_id': this.answerUserId})
                    .then(response => {
                        this.userInfo.followers = response.data.followers;
                        this.userInfo.answers = response.data.answers;
                        this.isActive = true
                    })
                    .catch(function (error) {
                        console.log(error)
                    })
            },
            mouseOut() {
                this.isActive = false
            }
        }
    }
</script>

<style scoped>
    .profile-small-box {
        position: relative;
        z-index: 1;
    }

    .profile-box {
        position: absolute;
        top: 50%;
        z-index: 2;
        width: 21rem;
    }

    .profile-block {
        width: 6rem;
    }

    .media {
        border-top: none;
    }

    .profile-text {
        word-break: break-word;
    }

    .profile-info-container {
        display: flex;
    }

    .button-container {
        display: flex;
        justify-content: space-between;
    }

    .button {
        width: 7rem
    }


</style>
